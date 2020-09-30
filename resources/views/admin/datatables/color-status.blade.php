                @switch($data->status)
                    @case('Not sent')
                        <p style="color: black">{{ $data->status }}</p>
                        @break
                    @case('Waiting accept')
                         <p style="color: gray">{{ $data->status }}</p>
                        @break
                    @case('On progress')
                        <p style="color: orange">{{ $data->status }}</p>
                       @break  
                    @case('Rejected')
                       <p style="color: red">{{ $data->status }}</p>
                        @break
                    @case('Compeleted')
                        <p style="color: green">{{ $data->status }}</p>
                         @break
                    @case('Edit')
                        <p style="color: blue">{{ $data->status }}</p>
                         @break
                    @default
                        
                @endswitch