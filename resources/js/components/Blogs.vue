<template>
    <div>
        <h2>Blogs</h2>
        <div class="card card-body mb-2" v-for="blog in blogs" v-bind:key="blog.id">
            <h3>{{blog.title}}</h3>
            <p>{{blog.content}}</p>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Blogs",
        data() {
            return {
                blogs: [],
                blog: {
                    id: '',
                    title: '',
                    content: ''
                },
                blog_id: '',
                pagination: {},
                edit: false

            }
        },
        methods: {
            fetchBlogs() {
                fetch('http://blogs.appp/api')
                    .then(res => res.json())
                    .then(res => {
                        this.blogs = res.data;
                        console.log(res.data)
                    })
            }
        },
        created() {
            this.fetchBlogs();
        }
    }
</script>

<style scoped>

</style>
