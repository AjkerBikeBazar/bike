<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="float-right"><b-button id="show-btn" @click="$bvModal.show('add-capacity')" class="mb-4">Add Capacity</b-button></div>
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
                            <tr v-for="capacity in capacities">
                                <td>{{capacity.id}}</td>
                                <td>{{capacity.name}}</td>
                                <td>{{capacity.slug}}</td>
                                <td>{{capacity.created_at | formatDate}}</td>
                                <td>{{capacity.updated_at | formatDate}}</td>
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
         <b-modal id="add-capacity" hide-footer>
    <template #modal-title>
      Add Capacity
    </template>
    <div class="d-block">
      <form @submit.prevent="addCapacity()">
          <div class="form-group">
              <label>Capacity</label>
              <input type="text" v-model="form.name" class="form-control" required>
              <button class="btn btn-primary mt-3" type="submit">Add Capacity</button>
              <b-button class="mt-3" @click="$bvModal.hide('add-capacity')">Close</b-button>
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
            capacities: [],
            form: {
                name: ''
            },
            errors: '',
        }
    },

    methods: {
        async loadCapacities(){
            axios.get('/api/capacity').then(res=>{
                this.capacities = res.data
            })
        },

        addCapacity(){
            axios.post('/api/capacity', this.form).then(res=>{
                //console.log(res.data)
                if(res.status === 200)
                {
                    this.form.name = '';
                    this.$bvModal.hide("add-capacity");
                    this.loadCapacities();
                    this.$swal(
                        "Created!",
                        "Your file has been created.",
                        "success"
                        );

                }
            });
        },

        deleteCapacities(capacity) {
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
            .delete(`/api/capacity/${capacity.id}`)
            .then((response) => {
              this.loadCapacities();
              //this.categories.splice(category, 1);
              if (response.status === 200) {
                console.log("Capacity Deleted");
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
        this.loadCapacities();
    }
}
</script>