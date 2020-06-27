import $ from 'jquery';

import initSwiperSlider from "./slider/slider";
import initSubscription from "./subscribe/subscribe";

$(document).ready(() => {
   initSwiperSlider();
   initSubscription();
});