import Swiper from 'swiper';

const initSwiperSlider = () => {
    const swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    return swiper;
};

export default initSwiperSlider;