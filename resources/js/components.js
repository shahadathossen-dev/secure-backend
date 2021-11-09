import Welcome from "@/Jetstream/Welcome.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetApplicationType from "@/Jetstream/ApplicationType.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import IndexView from "@/Views/IndexView.vue";
import Datatable from "@/Jetstream/Datatable.vue";


export default function (app) {
    app.component('welcome', Welcome);
    app.component('head', Head);
    app.component('link', Link);
    app.component('applicationMark', JetApplicationMark);
    app.component('applicationType', JetApplicationType);
    app.component('dropdown', JetDropdown);
    app.component('dropdownLink', JetDropdownLink);
    app.component('indexView', IndexView);
    app.component('DataTable', Datatable);

}
