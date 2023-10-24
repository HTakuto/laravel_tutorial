<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("index") }}<br>
                    <a href="{{route('contacts.create')}}" class="text-blue-500">新規登録</a>
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">件名</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">日時</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                              <td class="px-4 py-3">{{$contact->id}}</td>
                              <td class="px-4 py-3">{{$contact->name}}</td>
                              <td class="px-4 py-3">{{$contact->title}}</td>
                              <td class="px-4 py-3 text-lg text-gray-900">{{$contact->created_at}}</td>
                              <td class="px-4 py-3 text-lg text-gray-900"><a href="{{ route('contacts.show', [ 'id' => $contact->id ] )}}">詳
                                細を見る</a></td>
                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
