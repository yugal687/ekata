<!-- website header -->
@extends('layouts.website.header')
<!-- website header ends -->

@section('style')
    <link href="{{ asset('css/webpages.css')}} " rel="stylesheet"/>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row py-5 d-flex justify-content-center text-center contact-us">
            <div class="container container-sm">
                <h1 class="">Our Story</h1>
                <p class="heading-description-main mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet architecto autem
                    deserunt, dolor doloremque dolores, eveniet facilis fuga ipsam natus nostrum reiciendis saepe sequi
                    voluptas voluptatibus! Corporis eligendi quibusdam rem?</p>
            </div>
        </div>
        <div class="container my-5">
            <div class="row d-flex align-items-center">
                <div class="col-md-7 col-sm-12 px-2 px-sm-3 px-lg-5">
                    <h3 class="heading-title mb-3">The Journey of Ekata Convenience
                        Store</h3>
                    <p class="heading-description-main text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto exercitationem id nemo quis
                        repudiandae sapiente. Ad amet autem beatae doloribus eligendi ex impedit itaque officiis, quas
                        quisquam, sit tempora voluptates?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet atque, aut earum eius in
                        inventore
                        libero maxime minima nisi perspiciatis possimus quas quibusdam quidem rerum similique tempore
                        unde
                        veritatis vitae?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At distinctio dolore dolores eius eum
                        harum in, labore molestiae nostrum placeat provident quae quisquam recusandae reiciendis,
                        repellendus rerum saepe voluptate voluptates!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, alias architecto assumenda autem
                        doloremque dolores eligendi facere illo, molestias natus neque nobis nulla numquam officia porro
                        quas quo ratione temporibus?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi aut consectetur
                        consequuntur deserunt doloribus dolorum ducimus exercitationem hic minus nisi nulla, quasi quos
                        repellat repellendus reprehenderit sed velit veritatis!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dignissimos ea facere impedit
                        libero
                        nam optio quibusdam ratione sint vitae. Adipisci aut deserunt excepturi nobis repellat. Maiores
                        nam
                        rem sit.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi consequatur cum ducimus in sint,
                        tenetur? Accusantium beatae cum delectus ea, eos excepturi inventore ipsum optio porro, quasi,
                        quis
                        recusandae voluptates?

                    </p>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('images/Rice_Page/Parliament-Gold-Rice__37939.1566787289.jpg') }}"
                         class="img-fluid" alt="" style="height: 400px; border-radius: 20px;">
                </div>
            </div>
        </div>
        <div class="missions-section">
            <div class="row text-center py-5 bg-main-primary text-white">
                <div class="col-md-3 col-ms-6 px-5">
                    <h3 class="mb-3 category-font">Who We Are</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at cum et eveniet nesciunt</p>
                </div>
                <div class="col-md-3 col-ms-6 px-5">
                    <h3  class="mb-3 category-font">Our Missions</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at cum et eveniet nesciunt</p>
                </div>
                <div class="col-md-3 col-ms-6 px-5">
                    <h3  class="mb-3 category-font">Our Promises</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at cum et eveniet nesciunt</p>
                </div>
                <div class="col-md-3 col-ms-6 px-5">
                    <h3  class="mb-3 category-font">Our Vibe</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at cum et eveniet nesciunt</p>
                </div>
            </div>
        </div>
    </div>
    </div>


@stop
