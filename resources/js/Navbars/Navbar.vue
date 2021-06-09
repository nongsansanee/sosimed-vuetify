<template>
    <v-app dark>
        <!-- <v-toolbar class="lime lighten-2 body-margin" height="2px" v-if="isLogin">
            <v-toolbar-title class=" text-uppercase ">
                <span>Vuetify</span>
            </v-toolbar-title>
   
        </v-toolbar> -->

         <v-card class="overflow-hidden">
        <v-app-bar
            color="teal lighten-3"
            dense
            dark
            v-if="isLogin"
        >
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>ระบบสารสนเทศภาควิชาอายุรศาสตร์</v-toolbar-title>

            <v-spacer></v-spacer>

            <!-- <v-btn icon>
                <v-icon color="orange">mdi-heart</v-icon>
            </v-btn> -->

            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>
            <div class=" hidden-md-and-up">
                <v-menu 
                    left
                    bottom
                >
            
                    <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        icon
                        v-bind="attrs"
                        color="yellow"
                        v-on="on"
                    >
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                    </template>

                    <v-list color="grey lighten-5">
                    <v-list-item
                        v-for="(item, i) in items"
                        :key="i"
                        @click="() => {}"
                    >
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item>
                    </v-list>
                </v-menu>
            </div>
            <template v-slot:extension >
                <v-tabs align-with-title class="d-none d-md-block">
                    <v-tab>Click Me 1</v-tab>
                    <v-tab>Click Me 2</v-tab>
                    <v-tab>Click Me 3</v-tab>
                </v-tabs>
            </template>
        </v-app-bar>
         </v-card>

        <!-- <v-main>
            <loginPage></loginPage>
        </v-main> -->
    </v-app>
</template>