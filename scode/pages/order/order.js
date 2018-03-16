import { Cart } from '../cart/cart-model.js';
// import { Order } from '../order/order-model.js';
// import { Address } from '../../utils/address.js';
var cart = new Cart();
// var order = new Order();
// var address = new Address();

Page({

    /**
     * 页面的初始数据
     */
    data: {

    },

    /**
     * 生命周期函数--监听页面加载
     */
    onLoad: function (options) {
        console.log(options);
        // return;
        var productsArr;  //订单中的商品数据，不是购物车的商品
        this.data.account = options.account;
        productsArr = cart.getCartDataFromLocal(true);
        this.setData({
            productsArr: productsArr,
            account: this.data.account,
            orderStatus: 0
        });
    },

    /**
     * 生命周期函数--监听页面初次渲染完成
     */
    onReady: function () {

    },

    /**
     * 生命周期函数--监听页面显示
     */
    onShow: function () {

    },

    /**
     * 生命周期函数--监听页面隐藏
     */
    onHide: function () {

    },

    /**
     * 生命周期函数--监听页面卸载
     */
    onUnload: function () {

    },

    /**
     * 页面相关事件处理函数--监听用户下拉动作
     */
    onPullDownRefresh: function () {

    },

    /**
     * 页面上拉触底事件的处理函数
     */
    onReachBottom: function () {

    },

    /**
     * 用户点击右上角分享
     */
    onShareAppMessage: function () {

    }
})