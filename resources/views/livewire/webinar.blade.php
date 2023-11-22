
<div class="w-full">
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    <div class="w-full h-full px-[2rem] bg-black py-[2rem]"
         x-data="{
            videoId: '{{ $video->id }}',

            init() {
                let player = new Plyr(this.$refs.presenter, {
                    controls: [ 'play-large', 'volume', 'settings' ],
                })

                // player events
                // https://github.com/sampotts/plyr#standard-media-events

                player.on('timeupdate', (event) => {
                  // const instance = event.detail.plyr;
                  // console.log(player.currentTime)
                  $wire.timeChanged(player.currentTime);
                })

                player.on('ended', (event) => {
                  // video ended
                })

                player.on('playing', (event) => {
                  // Sent when the media begins to play
                })


            },

            timeToSeconds(hms = '02:04:33') {
                let [hours, minutes, seconds] = hms.split(':');
                return totalSeconds = (+hours) * 60 * 60 + (+minutes) * 60 + (+seconds);
            }
         }"
    >

        <div class="w-full h-full">

            <div class="w-full h-full flex items-stretch my-3">
                <div class="w-[70%] rounded-lg overflow-hidden flex flex-col">
                    <div class="rounded-md my-3 px-3 py-2 flex justify-between bg-white">
                        <p class="font-[500] text-[24px]">Try Seller Webinar</p>
                        <button class="inline-flex rounded-md bg-[#5932EA] text-white px-3 py-2 font-[500]">Start A Free Trial</button>
                    </div>

                    {{-- player --}}
                    <div class="border-solid border-2 border-gray-400 shadow-md rounded overflow-hidden p-0">

                        <div x-ref="presenter"
                             class="absolute aspect-video "
                             data-plyr-provider="{{ $video->source() }}"
                             data-plyr-embed-id="{{ $video->link }}"
                        ></div>

                    </div>

                </div>
                <div class="w-[30%] ml-4">
                    <div class="px-4 py-1 flex justify-evenly rounded-md my-3 bg-white">
                        <button class="rounded-md w-full px-4 py-4 justify-center text-center  font-[500] text-white flex items-center">
                            <a href="#public/edit-automated-webinar/live-video.html" class="text-center"><img src="{{ asset('storage/images/chat-purple.svg') }}" /></a>
                        </button>
                        <button class="rounded-md w-full px-4 py-4 justify-center text-center font-[500] text-white flex items-center">
                            <a href="#public/edit-automated-webinar/live-quiz.html"  class="text-center"><img src="{{ asset('storage/images/quiz.svg') }}" /></a>
                        </button>
                        <button class="rounded-md w-full px-4 py-4 justify-center  text-center  font-[500] text-white flex items-center">
                            <a  href="#public/edit-automated-webinar/live-survey.html" class="text-center"><img src="{{ asset('storage/images/surveys.svg') }}"/></a>
                        </button>
                        <button class="rounded-md w-full px-4 py-4 justify-center text-center     font-[500] text-white flex items-center">
                            <a href="#public/edit-automated-webinar/live-poll.html" class="text-center"><img src="{{ asset('storage/images/polls.svg') }}"/></a>
                        </button>
                        <button class="rounded-md w-full px-4 py-4 justify-center text-center  bg-[#5932EA] font-[500] text-white flex items-center">
                            <a href="#public/edit-automated-webinar/live-annoucements.html" class="text-center"><img src="{{ asset('storage/images/bell-white.svg') }}"/></a>
                        </button>
                    </div>

                    <div class="rounded-md border overflow-hidden border-[#37415180] bg-white ">

                        <div class="px-4 py-5">
                            <button class="rounded-md w-full px-4 py-4 justify-center text-center bg-[#5932EA] font-[500] text-white flex items-center">
                                <p class="text-center">
                                    Live Attendees:
                                    <span id="attendees">150</span>
                                </p>
                            </button>
                        </div>
                        <div class="w-full h bg-[#5932EA21] text-center text-black font-[500] py-1 px-2">Alerts & Announcements</div>
                        <div class="px-4 py-3 flex flex-col items-stretch mb-[6rem] mx-3 my-3 rounded-md bg-[#EAE4FC] h-full">
                            <div>
                                <img src="{{ asset('storage/images/annoucment.svg') }}" class="rounded-md"/>
                            </div>
                            <div class="text-center text-[18px] font-[500] my-7">Horem ipsum dolor sit amet, consectetur adipiscing elit. Nuncf vulputate libero et velit interdum.</div>
                            <div class="flex flex-col space-y-4 my-3">
                                <button class="rounded-lg bg-[#5932ea] px-3 py-3 text-center font-[500] text-white">Full Payment</button>
                                <button class="rounded-lg bg-[#5932ea] px-3 py-3 text-center font-[500] text-white">Half Payment</button>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
