<?php

if(! function_exists( 'uploadFile' ) )
{
    /**
     * Upload files to the server.
     */
    function uploadFile( $input, $request )
    {
        $uploadService = new \App\Services\UploadService\UploadService;

        if( !empty( $request->file( $input ) ) )
				{
						if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/' . str_plural( $input ) )->move() )
						{
							  return $uploadService->getTargetFile();
						}
				}
				elseif( $request->input( 'remove_' . $input ) == 'true' )
				{
						return '';
				}
    }
}
