import $ from 'jquery';

import initSwiperSlider from "./slider/slider";
import initSubscription from "./subscribe/subscribe";
import initUploader from "./uploaders/upload";

$(document).ready(() => {
   initSwiperSlider();
   initSubscription();
   initUploader();
});