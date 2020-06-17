<span id="app">
<section>
        <div class="v2-hom-search">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <div class="v2-ho-se-ri">
                        <h5></h5>
                        <h1>Travel Swiftly! Travel Comfortably!</h1>
                        <p>Offering You Convenient Transportation to Your Desired Destinations</p>
                        <div class="tourz-hom-ser v2-hom-ser">
                            <ul>
                                <!-- <li>
                                    <a href="#" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="images/icon/31.png" alt=""> Flight</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="">
                        <form @submit.prevent="processData" class="v2-search-form">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" v-model="search.from"  id="select-city" class="">
                                    <label for="select-city">Flying From</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" v-model="search.to"  id="select-city" class="">
                                    <label for="select-city">Flying To</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="date" v-model="search.dat" name="from">
                                    <!-- <label for="from">Departure Date</label> -->
                                </div>
                                <!-- <div class="input-field col s6">
                                    <input type="text"  id="to" name="to">
                                    <label for="to">Departure Date</label>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<flights v-if="flightData.length" :sdata="flightData"></flights>

</span>
