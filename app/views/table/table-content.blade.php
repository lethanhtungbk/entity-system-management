@if ($dataTable != null)
<table class="table table-striped table-bordered table-hover" id="sample_1">
    @if (count($dataTable->headColumns) > 0)
    <thead>
        <tr>
            @if ($dataTable->checkAllMode)
            <th class="table-checkbox">
                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
            </th>
            @endif
            @foreach ($dataTable->headColumns as $headColumn)
            <th {{$headColumn->style}}>
                {{$headColumn->title}}
            </th>
            @endforeach            
        </tr>
    </thead>
    @endif
    @if (count($dataTable->dataRows) > 0)
    <tbody>
        @foreach ($dataTable->dataRows as $dataRow)
        <tr class="odd gradeX">
            @if ($dataTable->checkAllMode)
            <td>
                <input type="checkbox" class="checkboxes" value="1"/>
            </td>
            @endif
            @foreach ($dataRow->dataColumns as $dataColumn)
            <td {{$dataColumn->style}}>
                @if ($dataColumn->type == Frenzycode\ViewModels\Table\DataColumn::TYPE_BUTTON)
                @include('components.button-bar',array('buttonBar' => $dataColumn->data))
                @else
                {{$dataColumn->data}}
                @endif
            </td>
            @endforeach            
        </tr>
        @endforeach       
    </tbody>
    @endif
</table>
@endif