<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="float-right"><b-button id="show-btn" @click="$bvModal.show('add-category')" class="mb-4">Add Category</b-button></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories">
                                <td>{{category.id}}</td>
                                <td>{{category.name}}</td>
                                <td>{{category.slug}}</td>
                                <td>{{category.created_at | formatDate}}</td>
                                <td>{{category.updated_at | formatDate}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" 
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
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

        <!-- Brand Add Modal -->
         <b-modal id="add-category" hide-footer>
    <template #modal-title>
      Add Category
    </template>
    <div class="d-block">
      <form @submit.prevent="addCategory()">
          <div class="form-group">
              <label>Category Name</label>
              <input type="text" v-model="form.name" class="form-control" required>
              <button class="btn btn-primary mt-3" type="submit">Add Category</button>
              <b-button class="mt-3" @click="$bvModal.hide('add-category')">Close</b-button>
          </div>
      </form>
    </div>
    
  </b-modal>
    </div>
</template>
<script>
export default {
    data(){
        return{
            categories: [],
            form: {
                name: ''
            },
            errors: '',
        }
    },

    methods: {
        async loadCategories(){
            axios.get('/api/category').then(res=>{
                this.categories = res.data
            })
        },

        addCategory(){
            axios.post('/api/category', this.form).then(res=>{
                //console.log(res.data)
                if(res.status === 200)
                {
                    this.form.name = '';
                    this.$bvModal.hide("add-category");
                    this.loadCategories();
                    this.$swal(
                        "Created!",
                        "Your file has been created.",
                        "success"
                        );

                }
            });
        },

        deleteCategory(category) {
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
          axios
            .delete(`/api/category/${category.id}`)
            .then((response) => {
              this.loadCategories();
              //this.categories.splice(category, 1);
              if (response.status === 200) {
                console.log("Category Deleted");
                this.$swal(
                  "Deleted!",
                  "Your file has been deleted.",
                  "success"
                );
              }
            });
        }
      });
    },
    },

    mounted(){
        this.loadCategories();
    }
}
</script>