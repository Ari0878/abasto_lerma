<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExpedientesExport implements FromCollection, WithHeadings
{
    protected $expedientes;

    public function __construct($expedientes)
    {
        $this->expedientes = $expedientes;
    }

    public function collection()
    {
        return $this->expedientes->map(function ($expediente) {
            return [
                'N° Expediente'      => $expediente->folio,
                'Nombre'             => $expediente->nombre,
                'Apellido Paterno'   => $expediente->ap,
                'Apellido Materno'   => $expediente->am,
                'Localización'       => $expediente->localizacion,
                'Giro'               => $expediente->giro,
                'Estado'             => $expediente->estado,
                'Tipo Expe'          => $expediente->tipo_expe,
                'Región'             => $expediente->region?->nombre ?? 'Sin región',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'N° Expediente',
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Localización',
            'Giro',
            'Estado',
            'Tipo de Expediente',
            'Región',
        ];
    }
}
