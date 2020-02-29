@if (count($data['campings_by_date_desc']) > 0)
    <div class="popular-listings">
        {{-- <h1>Posts by date desc:</h1> --}}
        @foreach ($data['campings_by_date_desc'] as $camping)
            <div class="card">
                <img src="/storage/placeholder_images/{{$camping->placeholder_image}}">
                <div class="card-info">
                    <h2>
                        <a href="/campings/{{$camping->id}}">
                            {{$camping->name}}
                        </a>
                    </h2>
                    <div class="location-info">
                        <div class="location">
                            <a href="#" class="link">{{$camping->city}}</a><a href="#" class="link">{{$camping->country}}</a>
                        </div>
                        <div class="ranking">
                            @for ($i = 0; $i < $camping->stars; $i++)
                                <span class="ranking-star"></span>
                            @endfor
                        </div>
                    </div>

                    <h3 class="ranking">Very good 9.2 / 10</h3>
                    
                    <div class="tag-list">
                        <a href="#" class="button button-tag ripple">Paris</a>
                        <a href="#" class="button button-tag ripple">Eiffel Tower</a>
                        <a href="#" class="button button-tag ripple">Trees</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif