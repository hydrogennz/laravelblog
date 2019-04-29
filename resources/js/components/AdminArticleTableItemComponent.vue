<template>
    <tr>
        <th scope="row">{{ article.title }}</th>
        <td>{{ article.author }}</td>
        <td>{{ article.publish_state ? "Published" : "Draft" }}</td>
        <td>
            <span v-if="article.publish_state">{{article.publish_date | formatDate }}</span>
            <span v-else>-</span>
        </td>
        <td>{{ article.num_views }}</td>
        <td>
            <a :href="'./articles/' + article._id + '/edit'">Edit</a> |
            <a :href="'./articles/' + article._id + '/destroy'">Delete</a>
        </td>
    </tr>
</template>

<script>
    export default {
        name: 'article-table-item',
        props: ['article']
    }
</script>