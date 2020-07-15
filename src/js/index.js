import $ from 'jquery';

import initSwiperSlider from "./slider/slider";
import initSubscription from "./subscribe/subscribe";
import initUploader from "./uploaders/upload";
import initBasicNotification from "./notifications/basicNotification";

$(document).ready(() => {
   initBasicNotification();
   initSwiperSlider();
   initSubscription();
   initUploader();
});