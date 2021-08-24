@if( Auth::check() )
<form action="{{ url('comments') }}" method="POST" class="form-horizontal">
@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            投稿フォーム
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム１ -->
        @if( Auth::check() )
        <form action="{{ url('comments') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- チーム名 -->
            <div class="form-group">
                <br>
                コメント
                <div class="col-sm-6">
                    <input type="text" name="comment_name" class="form-control">
                </div>
            </div>
            <!--　登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
        @endif
    <!-- 以下表示機能 -->
    <!-- 全てのギルドリスト -->
    @if (count($comments) > 0)
       <div class="card-body">
           <div class="card-body">
               <table class="table table-striped task-table">
                   <!-- テーブルヘッダ -->
                   <thead>
                       <th>コメント一覧</th>
                       <th>オーナー</th>
                       <th>賛同人数</th>
                       <th>賛同</th>
                   </thead>
                   <!-- テーブル本体 -->
                   <tbody>
                       @foreach ($comments as $comment)
                           <tr>
                               <!-- コメント -->
                               <td class="table-text">
                                   <div>{{ $comment->comment_name }}</div>
                               </td>
                                <!-- 発言者 -->
                               <td class="table-text">
                                  <div>{{ $comment->user->name }}</div>
                               </td>
                               <!-- 賛同人数 -->
                                <td class="table-text">
                                     <div>{{ $comment->members()->count() }}人賛同</div>
                                </td>
				                <!-- 賛同ボタン -->
                               <td class="table-text">
                                   @if(Auth::check())
                                　@if(Auth::id() != $comment->user_id && $comment->members()->where('user_id',Auth::id())->exists() !== true)
                                 　<form action="{{ url('comment/'.$comment->id) }}" method="GET">
                                	{{ csrf_field() }}
                                	<button type="submit" class="btn btn-danger">
                                	賛同
                                	</button>
                                　　</form>
                                　@endif
                                @endif
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>		
   @endif
       
   <!-- 表示機能ここまで -->
@endsection
</form>
@endif