<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Book;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::count())
                ->icon('heroicon-o-book-open'),
            Stat::make('Total Authors', Author::count())
                ->icon('heroicon-o-users'),
            Stat::make('Available', Book::where('status', 'available')->count())
                ->color('success'),
            Stat::make('Borrowed', Book::where('status', 'borrowed')->count())
                ->color('warning'),
        ];
    }
}