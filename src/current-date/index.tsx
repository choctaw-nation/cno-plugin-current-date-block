import { registerBlockType } from '@wordpress/blocks';
import Edit from './Edit';
import metadata from './block.json';
import { scheduled as icon } from '@wordpress/icons';

registerBlockType( metadata.name, {
	icon,
	edit: Edit,
	save: () => null,
} );
