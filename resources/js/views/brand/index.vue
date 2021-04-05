<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="float-right">
          <b-button
            id="show-btn"
            @click="$bvModal.show('add-brand')"
            class="mb-4"
            >Add Brand</b-button
          >
        </div>
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
                <td>{{ brand.id }}</td>
                <td>logo</td>
                <td>{{ brand.name }}</td>
                <td>{{ brand.slug }}</td>
                <td>201</td>
                <td>54df</td>
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
                      <button class="dropdown-item" @click="deleteBrand(brand)">
                        Delete
                      </button>
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
      <template #modal-title> Add Brand </template>
      <div class="d-block">
        <form @submit.prevent="addBrand()">
          <div class="form-group">
            <label>Brand Name</label>
            <input
              type="text"
              v-model="form.name"
              class="form-control"
              required
            />
          </div>
          <div class="form-group">
            <label>Brand Logo</label>
            <input
              type="file"
              id="brandLogo"
              @change="getThumbnail"
              class="form-control"
              required
            />
          </div>
          <div class="form-group">
            <label>Brand Description</label>
            <textarea class="form-control" rows="6" v-model="form.description"></textarea>
          </div>
          <div class="form-group">
            <label>Meta Keywords</label>
            <input
              type="text"
              v-model="form.meta_keyword"
              class="form-control"
              required
            />
          </div>
          <div class="form-group">
            <label>Meta Description</label>
            <input
              type="text"
              v-model="form.meta_description"
              class="form-control"
              required
            />
          </div>
          <button class="btn btn-primary mt-3" type="submit">Add Brand</button>
          <b-button class="mt-3" @click="$bvModal.hide('add-brand')"
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
      brands: [],
      form: {
        name: "",
        logo: "",
        description: "",
        meta_keyword: "",
        meta_description: "",
      },
    };
  },

  methods: {
    async loadBrands() {
      axios.get("/api/brand").then((res) => {
        this.brands = res.data;
      });
    },
    getThumbnail(e) {
      this.form.logo = e.target.files[0];
      console.log(this.form.logo)
    },
    addBrand() {
      const formData = new FormData();
      formData.append("name", this.form.name);
      formData.append("description", this.form.description);
      formData.append("meta_keyword", this.form.meta_keyword);
      formData.append("meta_description", this.form.meta_description);
      formData.append(
        "logo",
        this.form.logo,
        this.form.logo.name
      );
      axios.post("/api/brand", formData).then((res) => {
        //console.log(res.status);
        if (res.status === 200) {
          this.form.name = "";
          this.form.description = "",
          this.form.meta_keyword = "",
          this.form.meta_description = "",
          this.form.logo = "",
          this.$bvModal.hide("add-brand");
          this.loadBrands();
          this.$swal("Created!", "Your file has been created.", "success");
        }
      });
    },
    deleteBrand(brand) {
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
          axios.delete(`/api/brand/${brand.id}`).then((response) => {
            this.loadBrands();
            //this.categories.splice(category, 1);
            if (response.status === 200) {
              console.log("Brand Deleted");
              this.$swal("Deleted!", "Your file has been deleted.", "success");
            }
          });
        }
      });
    },
  },

  mounted() {
    this.loadBrands();
  },
};
</script>