<template>
    <div class="new-listings">
        <div class="card" v-for="camping in campings" v-bind:key="camping.id">
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