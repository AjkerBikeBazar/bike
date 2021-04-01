<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="float-right mb-3">
                    <router-link :to="{name: 'BikeAdd'}" class="btn btn-success">Add Bike</router-link>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Update at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="bike in bikes">
                            <td>{{bike.id}}</td>
                            <td>{{bike.name}}</td>
                            <td>{{bike.slug}}</td>
                            <td>{{bike.brand.name}}</td>
                            <td>{{bike.category.name}}</td>
                            <td>{{bike.created_at | formatDate}}</td>
                            <td>{{bike.updated_at | formatDate}}</td>
                            <td>
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" 
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <router-link class="dropdown-item" :to="{name:'BikeShow', params:{id: bike.id},}">Show</router-link>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            bikes : [],
        }
    },

    methods: {
        async loadBikes(){
            axios.get('/api/bike').then(res=>{
                this.bikes = res.data;
            })
        }
    },

    mounted(){
        this.loadBikes();
    }
}
</script>