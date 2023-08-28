

<div class="row packageBottom mt-4">
    <div class="offset-lg-3 col-lg-9 col-md-12">
        <div class="portfolioName">
            <h3>{{ Auth::user()->name ?? '' }} Portfolio</h3>
        </div>
        <main class="main">
            <div class="container containerOne">
            {{-- @dd(count($userPortfolioImage) > 0)       --}}
                @if (count($userPortfolioImage) > 0)
                @foreach ($userPortfolioImage as $value)
                <div class="card">
                    <div class="card-image">
                        <a href="#" data-fancybox="gallery{{ $value->image }}">
                            {{-- @dd($value->image) --}}
                            <img src="{{ (!empty($value->image)) ? asset('storage/uploads/cms/'. $value->image) : asset('storage/uploads/No-image.jpg') }}"
                            alt="Image Gallery" style="width: 100%; height: 100%;">
                        </a>
                    </div>
                    <div class="hoverClose">
                        <div class="hoverCloseIcon">
                            <a id="delete" href="{{ route('guard.portfolio.delete',$value->id) }}"><i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                   <div class="card-image">
                        <a href="#" data-fancybox="gallery">
                            <img src="{{asset('storage/uploads/No-image.jpg') }}"
                                alt="Image Gallery" style="height:150px; width:150px;">
                        </a>
                    </div>
                @endif
            </div>
        </main>
        <form id="upload-form" method="post" action="{{ route('guard.portfolio.store') }}" enctype="multipart/form-data">
            <div class="portfolioHeading">
                @csrf
            <div>
                <label class="uploadBtn">
                    <p>Upload Image</p>
                    <input type="file" name="image[]" multiple placeholder="Upload Profile Image"
                        class="uploadInputfile">
                </label>
                <button type="submit" class="addJobButton">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>
