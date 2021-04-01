<template>
  <div>
    <div class="card">
      <div class="card-body">
        <!-- Basic Details -->
        <div class="card">
          <h5 class="card-header">Basic Details</h5>
          <div class="card-body row">
            <div class="col-md-8 offset-md-2">
              <table class="table table-striped">
                <tbody>
                  <tr v-if="bike.name !== null">
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ bike.name }}</td>
                  </tr>
                  <tr v-if="brand_name !== null">
                    <td>Brand</td>
                    <td>:</td>
                    <td>{{ brand_name }}</td>
                  </tr>
                  <tr v-if="category !== null">
                    <td>Category</td>
                    <td>:</td>
                    <td>{{ category }}</td>
                  </tr>
                  <tr v-if="bike.price !== null">
                    <td>Price</td>
                    <td>:</td>
                    <td>{{ bike.price }}</td>
                  </tr>
                  <tr>
                    <td>Availability</td>
                    <td>:</td>
                    <td>{{ bike.product_availability }}</td>
                  </tr>
                  <tr>
                    <td>Launched</td>
                    <td>:</td>
                    <td>12 January 2021</td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
        </div>

        <!-- Engine & Transmission -->
        <div class="card">
          <h5 class="card-header">Engine & Transmission</h5>
          <div class="card-body row">
              <div class="col-md-8 offset-md-2">
            <table class="table table-striped">
                <tbody>
                  <tr v-if="bike.displacement !== null">
                    <td>Displacement</td>
                    <td>:</td>
                    <td>{{ bike.displacement }}</td>
                  </tr>
                  <tr v-if="bike.max_power !== null">
                    <td>Max Power</td>
                    <td>:</td>
                    <td>{{ bike.max_power }}</td>
                  </tr>
                  <tr v-if="bike.max_torque !== null">
                    <td>Max Torque</td>
                    <td>:</td>
                    <td>{{ bike.max_torque }}</td>
                  </tr>
                  <tr v-if="bike.bore !== null">
                    <td>Bore</td>
                    <td>:</td>
                    <td>{{ bike.bore }}</td>
                  </tr>
                  <tr v-if="bike.stroke !== null">
                    <td>Stroke</td>
                    <td>:</td>
                    <td>{{ bike.stroke }}</td>
                  </tr>
                  <tr v-if="bike.gear !== null">
                    <td>Gear</td>
                    <td>:</td>
                    <td>{{ bike.gear }}</td>
                  </tr>
                  <tr v-if="bike.clutch !== null">
                    <td>Clutch</td>
                    <td>:</td>
                    <td>{{ bike.clutch }}</td>
                  </tr>
                  <tr v-if="bike.cooling_system !== null">
                    <td>Cooling System</td>
                    <td>:</td>
                    <td>{{ bike.cooling_system }}</td>
                  </tr>
                  <tr v-if="bike.fuel_supply !== null">
                    <td>Fuel Supply</td>
                    <td>:</td>
                    <td>{{ bike.fuel_supply }}</td>
                  </tr>
                  <tr v-if="bike.starting_method !== null">
                    <td>Starting Method</td>
                    <td>:</td>
                    <td>{{ bike.starting_method }}</td>
                  </tr>
                </tbody>
                
            </table>
              </div>
          </div>
        </div>

        <!-- Basic Details -->
        <div class="card">
          <h5 class="card-header">Dimensions</h5>
          <div class="card-body row">
              <div class="col-md-8 offset-md-2">
                  <table class="table table-striped">
                      <tbody>
                  <tr v-if="bike.fuel_tank_capacity !== null">
                      <td>Fuel Tank Capacity</td>
                      <td>:</td>
                      <td>{{bike.fuel_tank_capacity}}</td>
                  </tr>
                  <tr v-if="bike.fuel_reserve !== null">
                      <td>Fuel Reserve</td>
                      <td>:</td>
                      <td>{{bike.fuel_reserve}}</td>
                  </tr>
                  <tr v-if="bike.ground_clearance !== null">
                      <td>Ground Clearance</td>
                      <td>:</td>
                      <td>{{bike.ground_clearance}}</td>
                  </tr>
                  <tr v-if="bike.height !== null">
                      <td>Height</td>
                      <td>:</td>
                      <td>{{bike.height}}</td>
                  </tr>
                  <tr v-if="bike.length !== null">
                      <td>Length</td>
                      <td>:</td>
                      <td>{{bike.length}}</td>
                  </tr>
                  <tr v-if="bike.width !== null">
                      <td>Width</td>
                      <td>:</td>
                      <td>{{bike.width}}</td>
                  </tr>
                  <tr v-if="bike.wheelbase !== null">
                      <td>Wheel Base</td>
                      <td>:</td>
                      <td>{{bike.wheelbase}}</td>
                  </tr>
                      </tbody>
                  </table>
              </div>
            
          </div>
        </div>

        <!-- Basic Details -->
        <div class="card">
          <h5 class="card-header">Brakes & Tyres</h5>
          <div class="card-body row">
              <div class="col-md-8 offset-md-2">
            <table class="table table-striped">
                <tbody>
              <tr v-if="bike.braking_system !== null">
                <td>Braking System</td>
                <td>:</td>
                <td>{{bike.braking_system}}</td>
              </tr>
              <tr v-if="bike.front_brake !== null">
                  <td>Front Brake</td>
                  <td>:</td>
                  <td>{{bike.front_brake}}</td>
              </tr>
              <tr v-if="bike.rear_brake !== null">
                  <td>Rear Brake</td>
                  <td>:</td>
                  <td>{{bike.rear_brake}}</td>
              </tr>
              <tr v-if="bike.front_tyre !== null">
                  <td>Front Tyre</td>
                  <td>:</td>
                  <td>{{bike.front_tyre}}</td>
              </tr>
              <tr v-if="bike.rear_tyre !== null">
                  <td>Rear Tyre</td>
                  <td>:</td>
                  <td>{{bike.rear_tyre}}</td>
              </tr>
                </tbody>
            </table>

              </div>
          </div>
        </div>

        <!-- Suspension & cheassis -->
        <div class="card">
          <h5 class="card-header">Suspension & cheassis</h5>
          <div class="card-body row">
              <div class="col-md-8 offset-md-2">
                  <table class="table table-striped">
                      <tbody>
                          <tr v-if="bike.chassis_type !== null">
                              <td>Chassis Type</td>
                              <td>:</td>
                              <td>{{bike.chassis_type}}</td>
                          </tr>
                          <tr v-if="bike.front_suspension !== null">
                              <td>Front Suspension</td>
                              <td>:</td>
                              <td>{{bike.front_suspension}}</td>
                          </tr>
                          <tr v-if="bike.rear_suspension !== null">
                              <td>Rear Suspension</td>
                              <td>:</td>
                              <td>{{bike.rear_suspension}}</td>
                          </tr>
                      </tbody>
                  </table>
              </div>

          </div>
        </div>

        <!-- Electical-->
        <div class="card">
          <h5 class="card-header">Electical</h5>
          <div class="card-body row">
              <div class="col-md-8 offset-md-2">
                  <table class="table table-striped">
                      <tbody>
                          <tr v-if="bike.battery !== null">
                              <td>Battery</td>
                              <td>:</td>
                              <td>{{bike.battery}}</td>
                          </tr>
                          <tr v-if="bike.head_light !== null">
                              <td>Head Light</td>
                              <td>:</td>
                              <td>{{bike.head_light}}</td>
                          </tr>
                          <tr v-if="bike.tail_light !== null">
                              <td>Tail Light</td>
                              <td>:</td>
                              <td>{{bike.tail_light}}</td>
                          </tr>
                          <tr v-if="bike.indicator_light !== null">
                              <td>Indicator Light</td>
                              <td>:</td>
                              <td>{{bike.indicator_light}}</td>
                          </tr>
                      </tbody>
                  </table>
              </div>

              </div>
        </div>

        <!-- Features -->
        <div class="card">
          <h5 class="card-header">Features</h5>
          <div class="card-body row">
              <div class="col-md-8 offset-2">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><i class="fas fa-times-circle"></i></td></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><i class="fas fa-check-circle"></i></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><i class="fas fa-check-circle"></i></td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><i class="fas fa-times-circle"></i></td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      bike: "",
      category: "",
      brand_name: "",
    };
  },

  methods: {
    async loadBike() {
      axios.get("/api/bike/" + this.$route.params.id).then((res) => {
        this.bike = res.data;
        this.brand_name = res.data.brand.name;
        this.category = res.data.category.name;
        console.log(res.data);
      });
    },
  },

  mounted() {
    this.loadBike();
  },
};
</script>

<style scoped>
.card-header {
  background-color: #053778;
  color: aliceblue;
}
tr {
  font-size: 1rem;
  vertical-align: middle;
}
</style>