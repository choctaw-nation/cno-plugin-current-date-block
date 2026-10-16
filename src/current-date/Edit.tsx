import { getDate, format } from '@wordpress/date';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import type { BlockEditProps } from '@wordpress/blocks';
import { PanelBody } from '@wordpress/components';
import { SelectControl } from '@wordpress/ui';

const allowedFormats = [ 'Y', 'Y-m-d', 'm/d/Y', 'M d', 'F j, Y', 'l, F j, Y' ];

export default function Edit( {
	attributes,
	setAttributes,
}: BlockEditProps< { format: string } > ) {
	const { format: dateFormat } = attributes;
	const today = getDate();
	const blockProps = useBlockProps( {
		dateTime: today.toISOString(),
	} );
	const options = allowedFormats.map( ( allowedFormat ) => ( {
		label: format( allowedFormat, today ) + ` (${ allowedFormat })`,
		value: allowedFormat,
	} ) );
	return (
		<>
			<InspectorControls>
				<PanelBody header="Date Format">
					<SelectControl
						label="Format"
						value={ dateFormat }
						items={ options }
						onValueChange={ ( newFormat ) =>
							setAttributes( { format: newFormat } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<time { ...blockProps }>{ format( dateFormat, today ) }</time>
		</>
	);
}
