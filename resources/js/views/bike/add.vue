<template>
  <div>
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="addBike()">
          <div class="card">
            <h5 class="card-header">Basic</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="name">Bike Name</label>
                <input type="text" class="form-control" v-model="form.name" />
              </div>
              <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" v-model="form.brand_id">
                  <option v-for="brand in brands" :value="brand.id">
                        {{ brand.name }}
                    </option>
                </select>
              </div>
              <div class="form-group">
                <label for="brand_id">CC</label>
                <select class="form-control" v-model="form.capacity_id">
                  <option v-for="capacity in capacities" :value="capacity.id">
                        {{ capacity.name }}
                    </option>
                </select>
              </div>
              <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" v-model="form.category_id">
                  <option v-for="category in categories" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
              </div>
              <div class="form-group">
                <label for="price">Bike Price</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.price"
                  id="price"
                />
              </div>
              <div class="form-group">
                <label for="launched_at">Launched At</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.launched_at"
                  id="launched_at"
                />
              </div>
              <div class="form-group">
                <label for="product_availability">Product Availability</label>
                <select
                  class="form-control"
                  v-model="form.product_availability"
                  id="product_availability"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
            </div>
          </div>

          <!-- //engine & Transmission -->
          <div class="card">
            <h4 class="card-header">Engine & Transmission</h4>
            <div class="card-body">
              <div class="form-group">
                <label for="displacement"><h5>Displacement</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="displacement"
                  v-model="form.displacement"
                />
              </div>
              <div class="form-group">
                <label for="max_power"><h5>Max Power</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="max_power"
                  v-model="form.max_power"
                />
              </div>
              <div class="form-group">
                <label for="max_torque"><h5>Max Torque</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="max_torquet"
                  v-model="form.max_torque"
                />
              </div>
              <div class="form-group">
                <label for="bore"><h5>Bore</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="bore"
                  v-model="form.bore"
                />
              </div>
              <div class="form-group">
                <label for="stroke"><h5>Stroke</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="stroke"
                  v-model="form.stroke"
                />
              </div>
              <div class="form-group">
                <label for="gear"><h5>Gear</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="gear"
                  v-model="form.gear"
                />
              </div>
              <div class="form-group">
                <label for="clutch">Clutch</label>
                <input
                  type="text"
                  class="form-control"
                  id="clutcht"
                  v-model="form.clutch"
                />
              </div>
              <div class="form-group">
                <label for="cooling_system"><h5>Cooling System</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="cooling_system"
                  v-model="form.cooling_system"
                />
              </div>
              <div class="form-group">
                <label for="fuel_supply"><h5>Fuel Supply</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="fuel_supply"
                  v-model="form.fuel_supply"
                />
              </div>
              <div class="form-group">
                <label for="starting_method"><h5>Starting Method</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="starting_method"
                  v-model="form.starting_method"
                />
              </div>
            </div>
          </div>

          <!-- //dimensions -->
          <div class="card">
            <h5 class="card-header">Dimensions</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="fuel_tank_capacity"
                  ><h5>Fuel Tank Capacity</h5></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="fuel_tank_capacity"
                  v-model="form.fuel_tank_capacity"
                />
              </div>
              <div class="form-group">
                <label for="fuel_reserve"><h5>Fuel Reserve</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="fuel_reserve"
                  v-model="form.fuel_reserve"
                />
              </div>
              <div class="form-group">
                <label for="ground_clearance"><h5>Ground Clearance</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="ground_clearance"
                  v-model="form.ground_clearance"
                />
              </div>
              <div class="form-group">
                <label for="height"><h5>Height</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="height"
                  v-model="form.height"
                />
              </div>
              <div class="form-group">
                <label for="length"><h5>Length</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="length"
                  v-model="form.length"
                />
              </div>
              <div class="form-group">
                <label for="width"><h5>Width</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="width"
                  v-model="form.width"
                />
              </div>
              <div class="form-group">
                <label for="wheelbase"><h5>Wheel Base</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="wheelbase"
                  v-model="form.wheelbase"
                />
              </div>
            </div>
          </div>

          <!-- //Brakes & Tyres -->
          <div class="card">
            <h5 class="card-header">Brakes & Tyres</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="braking_system"><h5>Braking System</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="braking_system"
                  v-model="form.braking_system"
                />
              </div>
              <div class="form-group">
                <label for="front_brake"><h5>Front Brake</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="front_brake"
                  v-model="form.front_brake"
                />
              </div>
              <div class="form-group">
                <label for="rear_brake"><h5>Rear Brake</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="rear_brake"
                  v-model="form.rear_brake"
                />
              </div>
              <div class="form-group">
                <label for="front_tyre"><h5>Front Tyre</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="front_tyre"
                  v-model="form.front_tyre"
                />
              </div>
              <div class="form-group">
                <label for="rear_tyre"><h5>Rear Tyre</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="rear_tyre"
                  v-model="form.rear_tyre"
                />
              </div>
            </div>
          </div>

          <!-- //Suspension & cheassis -->
          <div class="card">
            <h5 class="card-header">Suspension & cheassis</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="chassis_type"><h5>Chassis Type</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="chassis_type"
                  v-model="form.chassis_type"
                />
              </div>
              <div class="form-group">
                <label for="front_suspension"><h5>Front Suspension</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="front_suspension"
                  v-model="form.front_suspension"
                />
              </div>
              <div class="form-group">
                <label for="rear_suspension"><h5>Rear Suspension</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="rear_suspension"
                  v-model="form.rear_suspension"
                />
              </div>
            </div>
          </div>

          <!-- //Electical -->
          <div class="card">
            <h5 class="card-header">Electical</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="battery"><h5>Battery</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="battery"
                  v-model="form.battery"
                />
              </div>
              <div class="form-group">
                <label for="head_light"><h5>Head Light</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="head_light"
                  v-model="form.head_light"
                />
              </div>
              <div class="form-group">
                <label for="tail_light"><h5>Tail Light</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="tail_light"
                  v-model="form.tail_light"
                />
              </div>
              <div class="form-group">
                <label for="indicator_light"><h5>Indicator Light</h5></label>
                <input
                  type="text"
                  class="form-control"
                  id="indicator_light"
                  v-model="form.indicator_light"
                />
              </div>
            </div>
          </div>

          <!-- //Features -->
          <div class="card">
            <h5 class="card-header">Features</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="clock"
                  ><h5>Clock</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.clock"
                  id="clock"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="engine_kill_switch"
                  ><h5>Engine Kill Switch</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.engine_kill_switch"
                  id="engine_kill_switch"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pass_light"
                  ><h5>Pass Light</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.pass_light"
                  id="pass_light"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="speedometer"
                  ><h5>Speedometer</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.speedometer"
                  id="speedometer"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Techometer"
                  ><h5>Techometer</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.techometer"
                  id="techometer"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="gear_indicator"
                  ><h5>Gear Indicator</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.gear_indicator"
                  id="gear_indicator"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="low_battery_indicator"
                  ><h5>Low Battery Indicator</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.low_battery_indicator"
                  id="low_battery_indicator"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
              <div class="form-group">
                <label for="low_fuel_indicator"
                  ><h5>Low Fuel Indicator</h5></label
                >
                <select
                  class="form-control"
                  v-model="form.low_fuel_indicator"
                  id="low_fuel_indicator"
                >
                  <option value="Available">Available</option>
                  <option value="Unavailable">Unavailable</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Add Bike Info</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        name: "",
        category_id: "",
        brand_id: "",
        price: "",
        product_availability: "",
        displacement: "",
        max_power: "",
        max_torque: "",
        bore: "",
        stroke: "",
        gear: "",
        clutch: "",
        cooling_system: "",
        fuel_supply: "",
        starting_method: "",
        fuel_tank_capacity: "",
        fuel_reserve: "",
        ground_clearance: "",
        height: "",
        length: "",
        width: "",
        weight: "",
        wheelbase: "",
        braking_system: "",
        front_brake: "",
        rear_brake: "",
        front_tyre: "",
        rear_tyre: "",
        chassis_type: "",
        front_suspension: "",
        rear_suspension: "",
        battery: "",
        head_light: "",
        tail_light: "",
        indicator_light: "",
        clock: "",
        engine_kill_switch: "",
        pass_light: "",
        speedometer: "",
        techometer: "",
        gear_indicator: "",
        low_battery_indicator: "",
        low_fuel_indicator: "",
        launched_at: "",
        capacity_id: "",
      },
      brands: [],
      categories : [],
      capacities : [],
    };
  },

  methods: {
      async loadBrands(){
            axios.get('/api/brand').then(res=>{
                this.brands = res.data
            })
      },
      async loadCapacities(){
            axios.get('/api/capacity').then(res=>{
                this.capacities = res.data
            })
      },
      async loadCategories(){
            axios.get('/api/category').then(res=>{
                this.categories = res.data
            })
        },
      addBike(){
          axios.post('/api/bike', this.form).then(res=>{
              this.$swal(
                        "Created!",
                        "Your file has been created.",
                        "success"
                        );

              this,this.resetFieldsMethod();
          })
      },

      resetFieldsMethod() {
        this.form.name                = "";
        this.form.category_id         = "";
        this.form.brand_id            = "";
        this.form.price               = "";
        this.form.product_availability= "";
        this.form.displacement        = "";
        this.form.max_power           = "";
        this.form.max_torque          = "";
        this.form.bore                = "";
        this.form.stroke              = "";
        this.form.gear                = "";
        this.form.clutch              = "";
        this.form.cooling_system      = "";
        this.form.fuel_supply         = "";
        this.form.starting_method     = "";
        this.form.fuel_tank_capacity  = "";
        this.form.fuel_reserve        = "";
        this.form.ground_clearance    = "";
        this.form.height              = "";
        this.form.length              = "";
        this.form.width               = "";
        this.form.weight              = "";
        this.form.wheelbase           = "";
        this.form.braking_system      = "";
        this.form.front_brake         = "";
        this.form.rear_brake          = "";
        this.form.front_tyre          = "";
        this.form.rear_tyre           = "";
        this.form.chassis_type        = "";
        this.form.front_suspension    = "";
        this.form.rear_suspension     = "";
        this.form.battery             = "";
        this.form.head_light          = "";
        this.form.tail_light          = "";
        this.form.indicator_light     = "";
        this.form.clock               = "";
        this.form.engine_kill_switch  = "";
        this.form.pass_light          = "";
        this.form.speedometer         = "";
        this.form.techometer          = "";
        this.form.gear_indicator      = "";
        this.form.low_battery_indicator= "";
        this.form.low_fuel_indicator  = "";
        this.form.launched_at = "";
        this.form.capacity_id = "";
    },
  },

  mounted(){
      this.loadBrands();
      this.loadCapacities();
      this.loadCategories();
  }
};
</script>

<style scoped>
.card-header {
  background-color: #053778;
  color: aliceblue;
}
</style>