<div data-aos="fade-up" class="w-full mt-20">
    <div class="mx-auto max-w-7xl text-center mb-6">
        <x-h3 class="font-bold text-6xl">News and Media</x-h3>
        <img src="{{ asset('images/home/line.svg') }}" alt="divider" class="mx-auto my-3">
        <x-p class="fony-thin text-center p-4">Welcome to the News & Media section of Madu Alliance. Stay updated with the latest news, press releases, and media coverage about our company, projects, and initiatives.</x-p>
    </div>

    <div class="news-slider-wrapper relative overflow-hidden py-8 mb-20">
        <!-- Custom nav buttons (used by Slick via selectors, and by fallback scroll) -->
        <button id="news-prev" class="news-nav-button" aria-label="Previous slide">‹</button>
        <button id="news-next" class="news-nav-button" aria-label="Next slide">›</button>
        <!-- slick target: #news-slider -->
        <div id="news-slider" class="news-slider">
            <!-- placeholder slide shown until API provides data -->
            <div class="slide p-2">
                <div class="bg-white shadow rounded overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ asset('images/home/news.svg') }}" alt="News image">
                    <div class="p-4 text-left">
                        <h2 class="text-base font-semibold">Latest News</h2>
                        <p class="text-sm">Explore breaking news stories and updates about Madu Alliance. From new projects and partnerships to achievements and sustainability initiatives.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Ensure slides render at a consistent height and width
    Default min-width increased slightly so fewer slides fit on wide viewports
    and we show 2 slides by default. */
#news-slider .slide { min-width: 320px; min-height: 360px; box-sizing: border-box; }
#news-slider .slide .bg-white { display: flex; flex-direction: column; height: 100%; }
#news-slider .slide .bg-white img { height: 180px; object-fit: cover; width: 100%; }
#news-slider .slide .bg-white .p-4 { flex: 1 1 auto; }
.news-slider-wrapper { --slide-min-height: 360px; }

/* Hide horizontal scrollbar while preserving scrolling (cross-browser) */
#news-slider { -ms-overflow-style: none; /* IE and Edge */ scrollbar-width: none; /* Firefox */ }
#news-slider::-webkit-scrollbar { display: none; height: 0; }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sliderEl = document.getElementById('news-slider');
    const wrapperEl = document.querySelector('.news-slider-wrapper');
    if (!sliderEl) return;

    const FALLBACK_IMAGE = '{{ asset('images/home/news.svg') }}';

    function buildSlideHtml(item) {
        const image = item.image_url || item.image || item.media || FALLBACK_IMAGE;
        const title = item.title || item.headline || 'Untitled';
        const description = (item.description || item.summary || '').slice(0, 200);
        const link = item.link || item.url || '#';

        return `
            <div class="slide p-2">
                <div class="bg-white shadow rounded overflow-hidden">
                    <a href="${link}" target="_blank" rel="noopener noreferrer">
                        <img class="w-full h-48 object-cover" src="${image}" alt="${title}">
                    </a>
                    <div class="p-4 text-left">
                        <h2 class="text-base font-semibold"><a href="${link}" target="_blank" rel="noopener noreferrer">${title}</a></h2>
                        <p class="text-sm">${description}</p>
                    </div>
                </div>
            </div>`;
    }

    // Fetch data from internal endpoint; controller enforces q and size.
    fetch('/news/headlines?country=us&language=en')
        .then(r => r.json())
        .then(data => {
            const items = (data && (data.results || data.data || data.items)) || [];

            if (!Array.isArray(items) || items.length === 0) {
                return; // keep placeholder
            }

            // build slides HTML
            sliderEl.innerHTML = items.map(buildSlideHtml).join('');

            // If Slick is available initialize it; otherwise apply simple horizontal scroll fallback
            try {
                if (window.jQuery && jQuery.fn && jQuery.fn.slick) {
                    const $s = jQuery('#news-slider');
                    if ($s.hasClass('slick-initialized')) {
                        $s.slick('unslick');
                    }
                    $s.slick({
                        // Reduce number of slides shown on wider viewports
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        infinite: true,
                        dots: true,
                        arrows: true,
                        // use our custom DOM buttons so appearance is consistent
                        prevArrow: jQuery('#news-prev'),
                        nextArrow: jQuery('#news-next'),
                        adaptiveHeight: false,
                        responsive: [
                            // at widths < 1024 show 2
                            { breakpoint: 1024, settings: { slidesToShow: 2 } },
                            // at widths < 768 show 1
                            { breakpoint: 768, settings: { slidesToShow: 1 } }
                        ]
                    });
                    // Ensure custom buttons are visible when slick initializes
                    jQuery('#news-prev, #news-next').show();
                } else {
                    // Fallback: make slides inline and allow horizontal scroll
                    sliderEl.style.display = 'flex';
                    sliderEl.style.gap = '1rem';
                    sliderEl.style.overflowX = 'auto';
                    sliderEl.querySelectorAll('.slide').forEach(s => {
                        s.style.minWidth = '320px';
                        s.style.minHeight = '360px';
                    });

                    // Hook up fallback prev/next buttons to scroll the container
                    const prevBtn = document.getElementById('news-prev');
                    const nextBtn = document.getElementById('news-next');
                    if (prevBtn && nextBtn) {
                        // show buttons in fallback mode
                        prevBtn.style.display = 'block';
                        nextBtn.style.display = 'block';
                        const scrollAmount = 340; // roughly one slide width
                        prevBtn.addEventListener('click', () => {
                            sliderEl.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                        });
                        nextBtn.addEventListener('click', () => {
                            sliderEl.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                        });
                    }
                }
            } catch (err) {
                console.error('Carousel init failed', err);
            }
        })
        .catch(err => console.error('Failed to load news:', err));
});
</script>

<style>
/* Nav buttons styling */
.news-nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 30;
    width: 44px;
    height: 44px;
    border-radius: 9999px;
    background: rgba(255,255,255,0.9);
    border: 1px solid rgba(0,0,0,0.08);
    display: none; /* shown only when needed */
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
}
#news-prev { left: 8px; }
#news-next { right: 8px; }

/* Make sure nav buttons are visible on hover of wrapper for better UX */
.news-slider-wrapper:hover .news-nav-button { display: flex; }

/* Reduce visual footprint on small screens */
@media (max-width: 768px) {
    .news-nav-button { width: 36px; height: 36px; font-size: 18px; }
}
</style>