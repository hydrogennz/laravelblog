<template>
    <div class="row justify-content-center">
        <div class="col">
            <div class="article card box-shadow">
                <div class="card-body">

                    <h2>{{ article.title }}</h2>
                    <footer class="blockquote-footer">by <cite title="Source Title"><a href="#">{{ article.author }}</a> - {{ article.publish_date | formatDate }}</cite></footer>

                    <div>
                        <blockquote class="blockquote">
                            <p class="mb-0">{{ getContentPreview(article) }}</p>
                        </blockquote>
                    </div>

                    <a class="float-right small" v-bind:href="'/articles/' + article._id">Continue Reading</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['article'],
        methods: {
            getContentPreview(article) {
                return article.content.length > 200 ? article.content.substring(0, 200) + '...' : article.content; 
            }
        }
    }
</script>
