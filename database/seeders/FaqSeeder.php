<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {

        /* GREETING */

        Faq::create([
            'question' => 'hi,hello,hey,hy,assalamualaikum,salam,how are you , hi you there',
            'answer' => 'Hello 👋 Welcome to Hangry Joe’s Glendale Heights! How can we help you today?'
        ]);

        /* HOURS */

        Faq::create([
            'question' => 'hours,time,open,closing,when open,when close',
            'answer' => 'We are open Monday–Wednesday 11AM–9PM and Thursday–Sunday 11AM–10PM.'
        ]);

        /* LOCATION */

        Faq::create([
            'question' => 'location,address,where,where located',
            'answer' => 'We are located at 252 Town Center Lane, Glendale Heights, Illinois 60139.'
        ]);

        /* CATERING */

        Faq::create([
            'question' => 'catering,event,party,office catering',
            'answer' => 'Yes! We provide catering for offices, events, and parties. Contact us to plan your next event with Hangry Joe’s!'
        ]);

        /* HALAL */

        Faq::create([
            'question' => 'halal,chicken halal,is halal,is your chicken halal?',
            'answer' => 'Yes, our chicken is halal certified.'
        ]);

        /* SPICE LEVELS */

        Faq::create([
            'question' => 'spice,spice level,spicy levels,how spicy,heat level',
            'answer' => 'Hangry Joe’s offers several spice levels: 1️⃣ No Seasoning 2️⃣ No Heat (light warmth) 3️⃣ Mild 4️⃣ Medium 5️⃣ Hot 6️⃣ Angry Hot 🔥 (waiver required).'
        ]);

        /* ANGRY HOT */

        Faq::create([
            'question' => 'angry hot,what is angry hot,angry hot meaning',
            'answer' => 'Angry Hot is our hottest spice level 🔥. It is extremely spicy and requires a waiver before ordering. Only for the brave!'
        ]);

        /* SIGNATURE DISH */

        Faq::create([
            'question' => 'signature dish,best item,best seller,what to try',
            'answer' => 'Our signature dish is the Nashville-style Hot Chicken Sando 🍔. Crispy chicken breast, special sauce, pickles, and cider slaw in a brioche bun.'
        ]);

        /* VEGAN OR VEGETARIAN */

        Faq::create([
            'question' => 'vegan,vegetarian,veg options',
            'answer' => 'While we specialize in hot chicken, we also offer vegetarian-friendly options like salads and loaded fries.'
        ]);

        /* ONLINE ORDERING */

        Faq::create([
            'question' => 'order online,online ordering,delivery,place order',
            'answer' => 'Yes! You can order online through our website: https://hangryjoesgh.com/ or through delivery platforms like UberEats and DoorDash.'
        ]);
        // new
         Faq::create([
            'question' => 'What type of oil do yo use , oil',
            'answer' => 'At Hangry Joe’s, we fry up all our delicious chicken using 100% soybean oil! 🌱🍗 It gives our chicken that perfect crispy crunch you crave. If you have any allergies or concerns, let us know and we’ll be happy to help!'
        ]);
        // ...
          Faq::create([
            'question' => 'Do you have gluten-free options , gluten free?',
            'answer' => 'While we can prepare items like our wings ‘naked’ without flour, please note that cross-contamination may occur with our oils. For those with gluten sensitivities, we recommend consulting with our front-of-house staff upon your visit. They can double-check with the chef regarding potential cross-contamination risks. Unfortunately, we’re currently unable to cater to individuals with celiac disease. 🍔🥗🚫🌾'
        ]);
        // ..
        Faq::create([
            'question' => 'What is hangryjoes signatures dish? signature dish?, whats your signature dish?',
            'answer' => 'Well, our crowning glory has to be the Nashville-style Hot Chicken Sando. It’s the stuff of legends and a true crowd-pleaser. Imagine a crispy, juicy chicken breast, generously slathered in our special sauce, all snugly tucked in a brioche bun with pickles and cider slaw. It’s a flavor explosion you won’t want to miss! And while you’re at it, don’t forget to check out this mouthwatering dish and more on our website, https://hangryjoes.com/. Join the Flock and get ready for a taste bud party! 🍔🐔🎉'
        ]);

    }
}