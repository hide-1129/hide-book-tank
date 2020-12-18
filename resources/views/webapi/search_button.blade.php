<div class="row">
    <div class="col-9">
        
        <form method="GET" action="{{ route('search') }}">
            <div class="form-inline input-group">
                <input type"text" name="keyword" class="form-control" />
                <div class="input-group-append">
                    
                    <button type="submit" class="btn-secondary">検索!</button>
                </div>
            </div>
        </form>
        
    </div>
</div>