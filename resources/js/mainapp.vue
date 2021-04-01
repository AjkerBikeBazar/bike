<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="dark">
      <b-container>
        <b-navbar-brand href="#">Bike</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item :to="{name: 'Dashboard'}"><i class="fa fa-tachometer-alt fa-fw"></i>dashboard</b-nav-item>
            <b-nav-item :to="{name: 'Brand'}"><i class="fas fa-images fa-fw"></i>Brand</b-nav-item>
            <b-nav-item :to="{name: 'Category'}"><i class="fa fa-list fa-fw"></i>Category</b-nav-item>
            <b-nav-item :to="{name: 'Capacity'}"><i class="fas fa-battery-full"></i>Capacity</b-nav-item>
            <b-nav-item :to="{name: 'Bike'}"><i class="fas fa-motorcycle fa-fw"></i>Bike</b-nav-item>
            <b-nav-item :to="{name: 'Showroom'}"><i class="fas fa-store-alt fa-fw"></i>Showroom</b-nav-item>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
            <!-- <b-nav-form>
              <b-form-input
                size="sm"
                class="mr-sm-2"
                placeholder="Search"
              ></b-form-input>
              <b-button size="sm" class="my-2 my-sm-0" type="submit"
                >Search</b-button
              >
            </b-nav-form> -->

            <!-- <b-nav-item-dropdown text="Lang" right>
              <b-dropdown-item href="#">EN</b-dropdown-item>
              <b-dropdown-item href="#">ES</b-dropdown-item>
              <b-dropdown-item href="#">RU</b-dropdown-item>
              <b-dropdown-item href="#">FA</b-dropdown-item>
            </b-nav-item-dropdown> -->

            <b-nav-item-dropdown right>
              <!-- Using 'button-content' slot -->
              <template #button-content>
                <em>Admin</em>
              </template>
              <b-dropdown-item  href="#">Profile</b-dropdown-item>
              <b-dropdown-item href="#">Sign Out</b-dropdown-item>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-container>
    </b-navbar>
    <main class="container mt-4">
      <router-view></router-view>
    </main>
  
  </div>
</template>
