/**
 * BLOCK: Qodeblock Pricing Table - Price Component
 */

// Import block dependencies and components
import classnames from 'classnames';
import Edit from './edit';

import deprecated from './deprecated/deprecated';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const {
	Component,
	Fragment
} = wp.element;

const {
	RichText,
	getFontSizeClass,
	FontSizePicker,
	withFontSizes,
	getColorClassName,
} = wp.editor;

// Import the element creator function (React abstraction layer)
const el = wp.element.createElement;

const iconEl = el('svg', { width: 25, height: 20 },
    el('path', { fill:"#2A74ED",d:"m19.89678,7.538512l-0.775859,-6.593725l-6.642436,-0.770169l-12.482544,12.391004l7.418257,7.363856l12.482544,-12.391004l0.000039,0.000039zm-4.785287,-2.613738c-0.729139,-0.723908 -0.729139,-1.897354 0.000039,-2.621146c0.729217,-0.72383 1.911293,-0.72383 2.64051,0.000039c0.729178,0.72383 0.729139,1.897277 -0.000039,2.621107c-0.729178,0.72383 -1.911254,0.723792 -2.64051,0z" } )
);

// Register the block
registerBlockType( 'qodeblock/qb-pricing-table-price', {
	title: __( 'Product Price', 'qodeblock' ),
	description: __( 'Adds a product price component with schema markup.', 'qodeblock' ),
	icon: iconEl,
	category: 'qodeblock',
	parent: [ 'qodeblock/qb-pricing-table' ],
	keywords: [
		__( 'pricing table', 'qodeblock' ),
		__( 'price', 'qodeblock' ),
		__( 'shop', 'qodeblock' ),
	],

	attributes: {
		price: {
			type: 'string',
		},
		currency: {
			type: 'string',
		},
		fontSize: {
			type: 'string',
		},
		customFontSize: {
			type: 'number',
			default: 60,
		},
		textColor: {
			type: 'string',
		},
		customTextColor: {
			type: 'string',
		},
		backgroundColor: {
			type: 'string',
		},
		customBackgroundColor: {
			type: 'string',
		},
		term: {
			type: 'string',
		},
		showTerm: {
			type: 'boolean',
			default: true
		},
		showCurrency: {
			type: 'boolean',
			default: true
		},
		paddingTop: {
			type: 'number',
			default: 10,
		},
		paddingRight: {
			type: 'number',
			default: 20,
		},
		paddingBottom: {
			type: 'number',
			default: 10,
		},
		paddingLeft: {
			type: 'number',
			default: 20,
		},
	},

	// Render the block components
	edit: Edit,

	// Save the attributes and markup
	save: function( props ) {

		// Setup the attributes
		const {
			price,
			currency,
			fontSize,
			customFontSize,
			backgroundColor,
			textColor,
			customBackgroundColor,
			customTextColor,
			term,
			showTerm,
			showCurrency,
			paddingTop,
			paddingRight,
			paddingBottom,
			paddingLeft,
		} = props.attributes;

		// Retreive the fontSizeClass
		const fontSizeClass = getFontSizeClass( fontSize );

		// Retreive the getColorClassName
		const textClass = getColorClassName( 'color', textColor );
		const backgroundClass = getColorClassName( 'background-color', backgroundColor );

		// Setup wrapper class names
		const wrapperClassName = classnames( {
			'has-background': backgroundColor || customBackgroundColor,
			'qb-pricing-table-price-wrap': true,
			[ textClass ]: textClass,
			[ backgroundClass ]: backgroundClass,
			'qb-pricing-has-currency': showCurrency && currency,
		} );

		// Setup class names
		const className = classnames( {
			'qb-pricing-table-price': true,
			[ fontSizeClass ]: fontSizeClass,
		} );

		// Setup styles
		const wrapperStyles = {
			backgroundColor: backgroundClass ? undefined : customBackgroundColor,
			color: textClass ? undefined : customTextColor,
			paddingTop: paddingTop ? paddingTop + 'px' : undefined,
			paddingRight: paddingRight ? paddingRight + 'px' : undefined,
			paddingBottom: paddingBottom ? paddingBottom + 'px' : undefined,
			paddingLeft: paddingLeft ? paddingLeft + 'px' : undefined,
		};

		// Setup styles
		const styles = {
			fontSize: fontSizeClass ? undefined : customFontSize,
		};

		// Setup currency styles
		var computedFontSize = fontSizeClass ? undefined : customFontSize;
		var currencySize = Math.floor(computedFontSize / 2.5);
		const currencyStyles = {
			fontSize: computedFontSize ? currencySize + 'px' : undefined,
		};

		// Setup term styles
		var termSize = Math.floor(computedFontSize / 2.5);
		const termStyles = {
			fontSize: computedFontSize ? termSize + 'px' : undefined,
		};

		// Save the block markup for the front end
		return (
			<div
				className={ wrapperClassName ? wrapperClassName : undefined }
				style={ wrapperStyles }
			>
				<div itemProp="offers" itemScope itemType="http://schema.org/Offer">
					{ currency && showCurrency && (
						<RichText.Content
							tagName="span"
							itemProp="priceCurrency"
							value={ currency }
							className="qb-pricing-table-currency"
							style={ currencyStyles }
						/>
					) }
					<RichText.Content
						tagName="div"
						itemProp="price"
						value={ price }
						className={ className ? className : undefined }
						style={ styles }
					/>
					{ term && showTerm && (
						<RichText.Content
							tagName="span"
							value={ term }
							className="qb-pricing-table-term"
							style={ termStyles }
						/>
					) }
				</div>
			</div>
		);
	},

	deprecated: deprecated,
} );
