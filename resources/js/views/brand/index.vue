<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="float-right"><b-button id="show-btn" @click="$bvModal.show('add-brand')" class="mb-4">Add Brand</b-button></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="brand in brands">
                                <td>{{brand.id}}</td>
                                <td>logo</td>
                                <td>{{brand.name}}</td>
                                <td>{{brand.slug}}</td>
                                <td>201</td>
                                <td>54df</td>
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
         <b-modal id="add-brand" hide-footer>
    <template #modal-title>
      Add Brand
    </template>
    <div class="d-block">
      <form @submit.prevent="addBrand()">
          <div class="form-group">
              <label>Brand Name</label>
              <input type="text" v-model="form.name" class="form-control" required>
              <button class="btn btn-primary mt-3" type="submit">Add Brand</button>
              <b-button class="mt-3" @click="$bvModal.hide('add-brand')">Close</b-button>
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
            brands: [],
            form:{
                name: ''
            }
        }
    },

    methods: {
        async loadBrands(){
            axios.get('/api/brand').then(res=>{
                this.brands = res.data
            })
        },

        addBrand(){
            axios.post('/api/brand', this.form).then(res=>{
                //console.log(res.status);
                if(res.status === 200)
                {
                    this.form.name = '';
                    this.$bvModal.hide("add-brand");
                    this.loadBrands();
                    this.$swal(
                        "Created!",
                        "Your file has been created.",
                        "success"
                        );

                }
            })
        }
    },

    mounted(){
        this.loadBrands();
    }
}
</script>