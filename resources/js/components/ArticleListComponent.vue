<template>
    <div>
	    <li v-if='articles.length === 0'>There are no articles yet!</li>

		<article-list-item
		    v-for="article in this.articles"
		    v-bind:key="article.id"
		    v-bind:article="article"
		></article-list-item>
	</div>
</template>

<script>
    export default {
        name: 'article-list',
        data() {
            return {
                articles: []
            };
        },
        created() {
            this.fetchArticles();
        },
        methods: {
            fetchArticles() {
                axios.get('/api/article').then((res) => {
                    this.articles = res.data;
                });
            }
        }
    }
</script>