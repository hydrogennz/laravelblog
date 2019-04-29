<template>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Title</th>
	      <th scope="col">Author</th>
	      <th scope="col">Status</th>
	      <th scope="col">Publish Date</th>
	      <th scope="col"># Views</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
			<tr 
				v-for="article in this.articles"
				v-bind:key="article.id"
				v-bind:article="article"
				is="admin-article-table-item"></tr>
			
			<tr v-if="articles.length === 0"><td colspan="100%">There are no articles here yet</td></tr>
	  </tbody>
	</table>
</template>

<script>
    export default {
        name: 'admin-article-table-component',
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
                axios.get('/api/article?showAll=true').then((res) => {
                    this.articles = res.data;
                });
            }
        }
    }
</script>