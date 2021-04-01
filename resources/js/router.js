import Router from "vue-router";
import Vue from 'vue'
Vue.use(Router);

import dashboard from "./views/dashboard/index";
import category from "./views/category/index";
import brand from "./views/brand/index";
import capacity from "./views/capacity/index";
import bike from "./views/bike/index";
import bikeAdd from "./views/bike/add";
import bikeShow from "./views/bike/show";
import bikeEdit from "./views/bike/edit";
import showroom from "./views/showroom/index";
import showroomAdd from "./views/showroom/add";
import showroomShow from "./views/showroom/show";
import showroomEdit from "./views/showroom/edit";

const routes = [
    {
        path: '/app/dashboard',
        component: dashboard,
        name: 'Dashboard'
    },
    {
        path: '/app/category',
        component: category,
        name: 'Category'
    },
    {
        path: '/app/brand',
        component: brand,
        name: 'Brand'
    },
    {
        path: '/app/capacity',
        component: capacity,
        name: 'Capacity'
    },
    {
        path: '/app/bike',
        component: bike,
        name: 'Bike'
    },
    {
        path: '/app/bike/add',
        component: bikeAdd,
        name: 'BikeAdd'
    },
    {
        path: '/appn/bike/show/:id',
        component: bikeShow,
        name: 'BikeShow'
    },
    {
        path: '/app/bike/edit/:id',
        component: bikeEdit,
        name: 'BikeEdit'
    },
    {
        path: '/app/showroom',
        component: showroom,
        name: 'Showroom'
    },
    {
        path: '/app/showroom/add/:id',
        component: showroomAdd,
        name: 'ShowroomAdd'
    },
    {
        path: '/app/showroom/show/:id',
        component: showroomShow,
        name: 'ShowroomShow'
    },
    {
        path: '/app/showroom/edit/:id',
        component: showroomEdit,
        name: 'ShowroomEdit'
    },
]



export default new Router({
    mode: 'history',
    routes

})