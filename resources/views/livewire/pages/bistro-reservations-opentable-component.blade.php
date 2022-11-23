 <section class="reservation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header wow fadeInDown">
                                <h1>Reservations<small>Book a table online. Powered by Opentable.</small></h1>
                            </div>
                        </div>
                    </div>
                    <div class="reservation-form wow fadeInUp">
                        <div class="open-table-container" data-restaurant-id="66241">
                            <div id="OT_searchWrapperAll">
                                 @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                <form name="ism" id="ism">
                                    <div id="OT_searchWrapper">
                                        <div id="OT_defList" class="row">
                                            <div id="OT_date" class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text" id="datepicker" class="OT_feedFormfieldCalendar datepicker" name="startDate" placeholder="Pick a date" wire:model="datepicker" onchange="this.dispatchEvent(new InputEvent('input'))"/>
                                                    <i class="fa fa-calendar-o"></i>
                                                </div>
                                            </div>
                                            <div id="OT_partySize" class="col-md-4">
                                                <div class="form-group">
                                                    <label>Guests</label>
                                                    <select name="PartySize" class="feedFormField" wire:model="guests">
                                                        <option selected disabled>How many of you?</option>
                                                        <option value="1">1 Person</option>
                                                        <option value="2">2 People</option>
                                                        <option value="3">3 People</option>
                                                        <option value="4">4 People</option>
                                                        <option value="5">5 People</option>
                                                        <option value="6">6 People</option>
                                                        <option value="7">7 People</option>
                                                        <option value="8">8 People</option>
                                                        <option value="9">9 People</option>
                                                        <option value="10">10 People</option>
                                                        <option value="11">11 People</option>
                                                        <option value="12">12 People</option>
                                                        <option value="13">13 People</option>
                                                        <option value="14">14 People</option>
                                                        <option value="15">15 People</option>
                                                        <option value="16">16 People</option>
                                                        <option value="17">17 People</option>
                                                        <option value="18">18 People</option>
                                                        <option value="19">19 People</option>
                                                        <option value="20">20 People</option>
                                                    </select>
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div id="OT_time" class="col-md-4">
                                                <div class="form-group">
                                                    <label>Time</label>
                                                    <select name="ResTime" class="feedFormField" wire:model="timepicker">
                                                        <option selected disabled>Pick a time</option>
                                                        <option value="12:00 AM">12:00 AM</option>
                                                        <option value="12:30 AM">12:30 AM</option>
                                                        <option value="1:00 AM">1:00 AM</option>
                                                        <option value="1:30 AM">1:30 AM</option>
                                                        <option value="2:00 AM">2:00 AM</option>
                                                        <option value="2:30 AM">2:30 AM</option>
                                                        <option value="3:00 AM">3:00 AM</option>
                                                        <option value="3:30 AM">3:30 AM</option>
                                                        <option value="4:00 AM">4:00 AM</option>
                                                        <option value="4:30 AM">4:30 AM</option>
                                                        <option value="5:00 AM">5:00 AM</option>
                                                        <option value="5:30 AM">5:30 AM</option>
                                                        <option value="6:00 AM">6:00 AM</option>
                                                        <option value="6:30 AM">6:30 AM</option>
                                                        <option value="7:00 AM">7:00 AM</option>
                                                        <option value="7:30 AM">7:30 AM</option>
                                                        <option value="8:00 AM">8:00 AM</option>
                                                        <option value="8:30 AM">8:30 AM</option>
                                                        <option value="9:00 AM">9:00 AM</option>
                                                        <option value="9:30 AM">9:30 AM</option>
                                                        <option value="10:00 AM">10:00 AM</option>
                                                        <option value="10:30 AM">10:30 AM</option>
                                                        <option value="11:00 AM">11:00 AM</option>
                                                        <option value="11:30 AM">11:30 AM</option>
                                                        <option value="12:00 PM">12:00 PM</option>
                                                        <option value="12:30 PM">12:30 PM</option>
                                                        <option value="1:00 PM">1:00 PM</option>
                                                        <option value="1:30 PM">1:30 PM</option>
                                                        <option value="2:00 PM">2:00 PM</option>
                                                        <option value="2:30 PM">2:30 PM</option>
                                                        <option value="3:00 PM">3:00 PM</option>
                                                        <option value="3:30 PM">3:30 PM</option>
                                                        <option value="4:00 PM">4:00 PM</option>
                                                        <option value="4:30 PM">4:30 PM</option>
                                                        <option value="5:00 PM">5:00 PM</option>
                                                        <option value="5:30 PM">5:30 PM</option>
                                                        <option value="6:00 PM">6:00 PM</option>
                                                        <option value="6:30 PM">6:30 PM</option>
                                                        <option value="7:00 PM">7:00 PM</option>
                                                        <option value="7:30 PM">7:30 PM</option>
                                                        <option value="8:00 PM">8:00 PM</option>
                                                        <option value="8:30 PM">8:30 PM</option>
                                                        <option value="9:00 PM">9:00 PM</option>
                                                        <option value="9:30 PM">9:30 PM</option>
                                                        <option value="10:00 PM">10:00 PM</option>
                                                        <option value="10:30 PM">10:30 PM</option>
                                                        <option value="11:00 PM">11:00 PM</option>
                                                        <option value="11:30 PM">11:30 PM</option>
                                                    </select>
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="OT_submitWrap" class="reservation-btn">
                                        <button type="submit" class="btn btn-default btn-lg OT_TableButton"  wire:click.prevent="addReservationOT()">Make Reservation</button>
                                    </div>

                                    <!-- // end .text-center -->
                                    <div class="OT_hidden">
                                        <input type="hidden" class="OT_hidden" name="RestaurantID" value="">
                                        <input type="hidden" class="OT_hidden" name="GeoID" value="7">
                                        <input type="hidden" class="OT_hidden" name="txtHidServerTime" value="6/26/2014 8:50 PM">
                                        <input type="hidden" class="OT_hidden" name="txtDateFormat" value="MM/dd/yyyy">
                                    </div>
                                </form>
                                <noscript>&amp;lt;a href="http://www.omniture.com" title="Web Analytics"&amp;gt;&amp;lt;img src="http://o.opentable.com/b/ss/otrestref/1/H.22.1--NS/0" height="1" width="1" border="0" alt="" /&amp;gt;&amp;lt;/a&amp;gt;</noscript>
                                <!--/DO NOT REMOVE/-->
                            </div>
                        </div>
                    </div>
                    <div class="reservation-footer">
                        <p>You can also call: <strong>+1 224 6787 004</strong> to make a reservation.</p>

                        <span></span>
                    </div>
                </div>
            </section>