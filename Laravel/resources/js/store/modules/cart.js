import Vue from "vue"

export default {
    namespaced: true,
    state: () => ({
        cart: {}
    }),
    mutations: {
        pushCartVariable(state, value) {
            let stateCart = { ...state.cart }

            if (stateCart[value.product_name]) {
                stateCart[value.product_name].product_count++
            } else {
                stateCart[value.product_name] = value
            }

            state.cart = stateCart

        },
        deleteCartVariable(state, value){
            let stateCart = { ...state.cart }
            console.log("delete");
        }
    },
    actions: {
        pushCartVariable({ commit, state }, value) {
            // let stateCart = { ...state.cart }

            // if (stateCart[value.product_name]) {
            //     stateCart[value.product_name].product_count++
            // } else {
            //     stateCart[value.product_name] = value
            // }


            commit("pushCartVariable", value)

        },
        deleteCartVariable({commit, state}, value){
            commit("deleteCartVariable", value)
        }
    },
    getter: {
        getCart: state => {
            return state.cart
        }
    }
}