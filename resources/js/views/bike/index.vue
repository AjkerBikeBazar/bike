<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="float-right mb-3">
                    <router-link :to="{ name: 'BikeAdd' }" class="btn btn-success"
                    >Add Bike
                    </router-link
                    >
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Update at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="bike in bikes">
                        <td>{{ bike.id }}</td>
                        <td>
                            <img
                                :src="'/storage/gallery/' + bike.thumbnail"
                                v-bind:alt="bike.thumbnail"
                                width="75"
                                height="60"
                            />
                        </td>
                        <td>{{ bike.name }}</td>
                        <td>{{ bike.price }} BDT</td>
                        <td>{{ bike.brand.name }}</td>
                        <td>{{ bike.category.name }}</td>
                        <td>{{ bike.created_at | formatDate }}</td>
                        <td>{{ bike.updated_at | formatDate }}</td>
                        <td>
                            <div class="dropdown">
                                <button
                                    class="btn btn-warning dropdown-toggle"
                                    type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Action
                                </button>
                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton"
                                >
                                    <router-link
                                        class="dropdown-item"
                                        :to="{ name: 'BikeEdit', params: { id: bike.id } }"
                                    >Edit
                                    </router-link
                                    >
                                    <router-link
                                        class="dropdown-item"
                                        :to="{ name: 'BikeShow', params: { id: bike.id } }"
                                    >Show
                                    </router-link
                                    >
                                    <button class="dropdown-item" @click="deleteBikes(bike)">
                                        Delete
                                    </button>
                                    <router-link
                                        class="dropdown-item"
                                        :to="{ name: 'BikeGallery', params: { id: bike.id } }"
                                    >Photo Gallery
                                    </router-link
                                    >
                                    <router-link
                                        class="dropdown-item"
                                        :to="{ name: 'BikeContent', params: { id: bike.id } }"
                                    >Content
                                    </router-link
                                    >
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
    data() {
        return {
            bikes: [],
        };
    },

    methods: {
        async loadBikes() {
            axios.get("/api/bike").then((res) => {
                this.bikes = res.data;
            });
        },

        deleteBikes(bike) {
            this.$swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                // <--
                if (result.value) {
                    // <-- if confirmed
                    axios.delete(`/api/bike/${bike.id}`).then((response) => {
                        this.loadBikes();
                        //this.categories.splice(category, 1);
                        if (response.status === 200) {
                            console.log("Bike Deleted");
                            this.$swal("Deleted!", "Your file has been deleted.", "success");
                        }
                    });
                }
            });
        },
    },

    mounted() {
        this.loadBikes();
    },
};
</script>
