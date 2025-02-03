import './../css/app.css';
import './bootstrap';

import AppLayout from '@/Layouts/AppLayout.vue';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: title => (title ? `${title} | ${appName}` : appName),
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const page = pages[`./Pages/${name.replaceAll('\\', '/')}.vue`];

        page.default.layout = page.default.layout || AppLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el);
    },
    progress: {
        color: '#fff',
    },
});
