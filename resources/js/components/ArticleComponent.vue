<template>
    <div class="">
        <h2>{{ article.title }}</h2>
        <footer class="blockquote-footer">by <cite title="Source Title"><a href="#">{{ article.author }}</a> - {{ article.publish_date | formatDate }}</cite></footer>         
        
        <div>
            <blockquote class="blockquote">
                <p class="mb-0">{{ article.content }}</p>
            </blockquote>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['article']
    }
</script>
