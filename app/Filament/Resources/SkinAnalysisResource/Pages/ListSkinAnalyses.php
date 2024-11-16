<?php

namespace App\Filament\Resources\SkinAnalysisResource\Pages;

use App\Filament\Resources\SkinAnalysisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkinAnalyses extends ListRecords
{
    protected static string $resource = SkinAnalysisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
