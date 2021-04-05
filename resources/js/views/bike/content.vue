<template>
    <div>
        <div class="card">
            <h4 class="card-header">
                Bike Content
            </h4>
            <form @submit.prevent="addContent()">
            <div class="card-body">
                <div class="form-group">
                    <label for="content"><h5>Content</h5></label>
                    <vue-editor id="editor1" v-model="form.bike_content"></vue-editor>
                </div>
                <div class="form-group">
                    <label for="meta_keyword"><h5>Meta Keyword</h5></label>
                    <textarea class="form-control" id="meta_keyword" v-model="form.meta_keyword"></textarea>
                </div>
                <div class="form-group">
                    <label for="meta_description"><h5>Meta Description</h5></label>
                    <textarea class="form-control" id="meta_description" v-model="form.meta_description"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Add Content</button>
            </div>

            </form>
        </div>
    </div>
</template>
<script>
import {VueEditor} from "vue2-editor";

export default {
    components: {
        VueEditor
    },

    data() {
        return {
            form: {
                bike_content: "",
                meta_keyword: "",
                meta_description: "",
            }
        };
    },

    methods: {
        addContent() {
            this.$swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!",
            }).then((result) => {
                // <--
                if (result.value) {
                    // <-- if confirmed
                    axios.post("/api/bike/content/" + this.$route.params.id, this.form).then(res => {
                        this.$swal(
                            "updated!",
                            "Your file has been created.",
                            "success"
                        );
                        console.log('created')
                    })
                }
            });
        },
        /*addContent() {
            axios.post("/api/bike/content/" + this.$route.params.id, this.form).then(res => {
                this.$swal(
                    "Created!",
                    "Your file has been created.",
                    "success"
                );
                console.log('created')
            })
        },*/
        async loadContent(){
            axios.get("/api/bike/content/get/" + this.$route.params.id).then(res =>{
                this.form.bike_content = res.data.content;
                this.form.meta_keyword = res.data.meta_keyword;
                this.form.meta_description = res.data.meta_description;
            })
        }
    },

    mounted() {
        this.loadContent();
    }
};
</script>

<style scoped>
vue-editor {
    height: 650px;
}

h5 {
    font-weight: 600;
}
</style>
