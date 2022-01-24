@section('title', '创建储存策略')

<x-app-layout>
    <div class="my-6 md:my-10">
        <div class="md:mt-0 md:col-span-2">
            <form action="{{ route('admin.strategy.create') }}" method="POST">
                <div class="overflow-hidden rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6 space-y-4">

                        <div class="col-span-6">
                            <label class="block">
                                <span class="text-gray-700">选择角色组</span>
                                <x-select class="block w-full mt-1 form-multiselect" multiple>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </x-select>
                            </label>
                        </div>

                        <div class="col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"><span class="text-red-600">*</span>名称</label>
                            <x-input type="text" name="name" id="name" placeholder="请输入策略名称" autocomplete="name" />
                        </div>

                        <div class="col-span-6">
                            <label for="intro" class="block text-sm font-medium text-gray-700">简介</label>
                            <x-textarea id="intro" name="intro" rows="3" placeholder="请输入简介，可为空"></x-textarea>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="key" class="block text-sm font-medium text-gray-700"><span class="text-red-600">*</span>储存策略</label>
                            <x-select id="key" name="key" autocomplete="key">
                                @foreach(\App\Models\Strategy::DRIVERS as $key => $driver)
                                <option value="{{ $key }}" {{ $loop->first ? 'selected' : '' }}>{{ $driver }}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="col-span-6">
                            <div class="col-span-6 sm:col-span-3 mb-4">
                                <label for="configs[root]" class="block text-sm font-medium text-gray-700">储存路径</label>
                                <x-input type="text" name="configs[root]" id="configs[root]" autocomplete="text" placeholder="图片保存位置，可为空" />
                                <small class="text-yellow-500"><i class="fas fa-exclamation"></i> 储存路径设置错误或没有读写权限可能会导致图片保存失败</small>
                            </div>
                        </div>

                        <div class="col-span-6 mb-4 hidden" data-driver="{{ \App\Enums\StrategyKey::Local }}">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="configs[domain]" class="block text-sm font-medium text-gray-700"><span class="text-red-600">*</span>访问域名</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="configs[domain]" id="configs[domain]" class="mt-1 block w-full rounded-l-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="请输入图片访问域名，需要加 http(s)://" />
                                    <span class="mt-1 inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">/uploads</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-button type="button" class="bg-gray-500" onclick="history.go(-1)">取消</x-button>
                        <x-button>确认创建</x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            // 设置选中驱动
            let setSelected = function () {
                $('[data-driver]').each(function () {
                    $(this)[$('#key').val() == $(this).data('driver') ? 'show' : 'hide']();
                });
            };

            setSelected();

            $('#key').change(function () {
                setSelected();
            });

            $('form').submit(function (e) {
                e.preventDefault();
                axios.post(this.action, $(this).serialize()).then(response => {
                    if (response.data.status) {
                        toastr.success(response.data.message);
                        setTimeout(function () {
                            window.location.href = '{{ route('admin.strategies') }}';
                        }, 3000);
                    } else {
                        toastr.error(response.data.message);
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>