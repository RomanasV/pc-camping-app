<template>
    <div class="popular-listings">
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
                        <a href="#" class="link">{{camping.city}}</a><a href="#" class="link">{{camping.country}}</a>
                    </div>
                    <div class="ranking">
                        <span class="ranking-star" v-for="(star, index) in camping.stars" v-bind:key="index"></span>
                    </div>
                </div>
                    <h3 class="ranking center">{{getRankingInWords(camping.ranking)}} {{camping.ranking}} / 10</h3>
                
                    <div class="tag-list">
                        <a 
                            href="#" 
                            class="button button-tag ripple"
                            v-for="(tag, index) in formTagsArray(camping.tags)"
                            v-bind:key="index">{{tag.trim()}}</a>                            
                    </div>
                </div>
            </div>
  
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
                page_url = page_url || '/api/campings/popular';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.campings = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },

            getRankingInWords(ranking) {
                let flooredRanking = Math.floor(ranking);
                let rankingInWords = RANKING_IN_WORDS[flooredRanking];
                return rankingInWords;
            },

            formTagsArray(tagsStr) {
                let tagsArray = tagsStr.split(',');
                return tagsArray;
            }

        }
    }
</script>