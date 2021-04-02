<template>
  <div>
    <div class="bla">
      <div class="float-right">
        <b-button id="show-btn" @click="$bvModal.show('add-photo')" class="mb-4"
          >Add photo</b-button
        >
      </div>
      <h3>Photo Gallery</h3>
    </div>

    <div class="row mb-4">
      <div v-for="gallery in galleries" class="col-md-4 mb-4">
        <div class="card">
          <img
            :src="'/storage/gallery/' + gallery.image"
            v-bind:alt="gallery.image"
            class="card-img-top"
          />
          <div class="card-body">
            <h5 class="card-title">{{ gallery.name }}</h5>
            <div v-if="gallery.is_main == 0">
              <button class="btn btn-primary" @click="makeMain(gallery)">Make Main</button>
              <button class="btn btn-danger" @click="deletePhoto(gallery)">Delete</button>
            </div>
            <div v-else-if="gallery.is_main === 1">
              <button class="btn btn-warning" @click="removeMain(gallery)">Remove Main</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Brand Add Modal -->
    <b-modal id="add-photo" hide-footer>
      <template #modal-title> Add Photo </template>
      <div class="d-block">
        <form @submit.prevent="addPhoto()">
          <div class="form-group">
            <label>Photo Name</label>
            <input type="text" v-model="form.name" class="form-control" />
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <input
              type="file"
              id="photo"
              @change="getThumbnail"
              class="form-control"
              required
            />
          </div>
          <button class="btn btn-primary mt-3" type="submit">Add Photo</button>
          <b-button class="mt-3" @click="$bvModal.hide('add-photo')"
            >Close</b-button
          >
        </form>
      </div>
    </b-modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        name: "",
        photo: "",
      },
      galleries: [],
    };
  },

  methods: {
    async loadGalleries() {
      axios.get("/api/gallery/" + this.$route.params.id).then((res) => {
        this.galleries = res.data;
        console.log(res.data);
      });
    },

    getThumbnail(e) {
      this.form.photo = e.target.files[0];
      console.log(this.form.photo);
    },

    addPhoto() {
      const formData = new FormData();
      formData.append("name", this.form.name);
      formData.append("photo", this.form.photo, this.form.photo.name);
      axios
        .post("/api/gallery/" + this.$route.params.id, formData)
        .then((res) => {
          //console.log(res.data)
          if (res.status === 200) {
            this.form.name = "";
            this.$bvModal.hide("add-photo");
            this.loadGalleries();
            this.$swal("Created!", "Your file has been created.", "success");
          }
        });
    },

    deletePhoto(gallery) {
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
            .delete(`/api/gallery/${gallery.id}`)
            .then((response) => {
              this.loadGalleries();
              //this.products.splice(product, 1);
              if (response.status === 200) {
                console.log("Photo Deleted");
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

    makeMain(gallery){
        this.$swal({
        title: "Are you sure?",
        text: "You want to make this main image!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, make it!",
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed
          axios
            .post("/api/gallery/main/"+this.$route.params.id+"/"+gallery.id)
            .then((response) => {
              this.loadGalleries();
              //this.products.splice(product, 1);
              if (response.status === 200) {
                console.log("Photo marked main");
                this.$swal(
                  "Marked as Main!",
                  "Your file has been marked as main.",
                  "success"
                );
              }
              if(response.status === 201) 
              {
                this.$swal(
                  "Oh No!",
                  "Spmething Went Wrong!",
                  "error"
                );
              };
            });
        }
      });
    },

    removeMain(gallery){
        this.$swal({
        title: "Are you sure?",
        text: "You want to remove from main image!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, make it!",
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed
          axios
            .post("/api/gallery/remove/"+gallery.id)
            .then((response) => {
              this.loadGalleries();
              //this.products.splice(product, 1);
              if (response.status === 200) {
                console.log("Photo removed main");
                this.$swal(
                  "Removed from Main!",
                  "Your file has been removed as main.",
                  "success"
                );
              }
              if(response.status === 201) 
              {
                this.$swal(
                  "Oh No!",
                  "Spmething Went Wrong!",
                  "error"
                );
              };
            });
        }
      });
    }
  },

  mounted() {
    this.loadGalleries();
  },
};
</script>

<style scoped>
.bla {
  display: block;
  margin-bottom: 25px;
}
</style>