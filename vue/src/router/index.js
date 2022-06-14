import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import Surveys from "../views/Surveys.vue";
import CreateSurvey from "../views/CreateSurvey.vue";
import PointsCollection from "../views/PointsCollection.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthLayout from "../components/AuthLayout.vue";
import store from "../store";

const routes =[
    {
        path: '/',
        redirect: '/dashboard', 
        component: DefaultLayout,
        meta: {requiresAuth: true},
        //every page in this would have the default layout
        children: [
            {
                path: '/dashboard',
                name: 'Dashboard',
                component: Dashboard
            }, 
            {
                path: '/surveys',
                name: 'Surveys',
                component: Surveys
            },
            {
                path: '/surveys/createSurvey',
                name: 'CreateSurvey',
                component: CreateSurvey
            },
            {
                path: '/pointsCollection',
                name: 'PointsCollection',
                component: PointsCollection
            }



        ]
    },
    {
        path: '/auth',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        meta: {isGuest: true},
        children: [
            {
                path: '/login',
                name: 'Login',
                component: Login
            },
            {
                path: '/register',
                name: 'Register',
                component: Register
            },
            
        ]

    }
    
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

//before routing
router.beforeEach((to, from, next) => {
    //if user is unauthorised 
    if(to.meta.requiresAuth && !store.state.user.token){
        next({name: 'Login'})
    

    // else if(store.state.user.token && to.name === 'Login' || to.name === 'Register')

    //if user is authorised, but wants to access login/register page 
    } else if(store.state.user.token && to.meta.isGuest){
        next({name: 'Dashboard'});

    //authorised, go next
    } else {
        next();
    }

})

export default router;