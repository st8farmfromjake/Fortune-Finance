<div class="col">
    <div class="card shadow-sm">
        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{$newsinfo['image']}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
        </img>
        <div class="card-body">
            <h4>{!!$newsinfo['title']!!}</h4>
            <p>{{mb_strimwidth(strip_tags($newsinfo['content']), 0, 200, "...")}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{$newsinfo['link']}}" class="text-decoration-none">Read More</a></button>
                </div>
                <small><a class="text-decoration-none link-info fs-6" href="{{$newsinfo['link']}}">{{$newsinfo['tickers']}}</a></small>
                <small class="text-body-secondary">{{date("F jS, Y h:i A", strtotime($newsinfo['date']))}}</small>
            </div>
        </div>
    </div>
</div>