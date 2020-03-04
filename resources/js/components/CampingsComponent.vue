<template>
    <div class="new-listings">
        <div class="card" v-for="camping in campings" v-bind:key="camping.id">
            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16 heart-icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"></path></svg>
            <img :src="`/storage/placeholder_images/${camping.placeholder_image}`">
            <div class="card-info">
                <h2>
                    <a :href="`/campings/${camping.id}`">
                        {{camping.name}}
                    </a>
                </h2>
                <div class="location-info">
                    <div class="location">
                        <a href="#" class="link" @click.prevent="fetchCampings(`/api/campings/city/${camping.city}`)">{{camping.city}}</a><a href="#" class="link" @click.prevent="fetchCampings(`/api/campings/country/${camping.country}`)">{{camping.country}}</a>
                    </div>
                    <div class="ranking">
                        <span class="ranking-star" v-for="(star, index) in camping.stars" v-bind:key="index"></span>
                    </div>
                </div>

                <h3 class="ranking center">{{getRankingInWords(camping.ranking)}} {{camping.ranking}} / 10</h3>
            
                <a :href="`/campings/${camping.id}`" class="button button-primary ripple">More information</a>
                
                <a :href="camping.website" target="_blank" class="link link-primary center">Where to book?</a>
            </div>
        </div>
        <ul class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                <a 
                    href="#" 
                    class="page-link"
                    @click.prevent="fetchCampings(pagination.prev_page_url)">
                    Previous
                </a>
            </li>
            <li class="page-item disabled">
                <a href="#" class="page-link">{{ pagination.current_page }} of {{ pagination.last_page }}</a>
            </li>
            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                <a 
                    href="#" 
                    class="page-link"
                    @click.prevent="fetchCampings(pagination.next_page_url)">
                    Next
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    import {RANKING_IN_WORDS} from '../config';
    export default {
        data() {
            return {
                campings: [],
                pagination: {},
            }
        },

        created() {
            this.fetchCampings();
        },

        methods: {
            fetchCampings(page_url) {
                let vm = this;
                page_url = page_url || '/api/campings';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.campings = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            
            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev,
                }

                this.pagination = pagination;
            },

            getRankingInWords(ranking) {
                let flooredRanking = Math.floor(ranking);
                let rankingInWords = RANKING_IN_WORDS[flooredRanking];
                return rankingInWords;
            }
        }
    }
</script>