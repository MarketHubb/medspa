/**
 * Inspector Controls
 */

// Setup the block
const { __ } = wp.i18n;
const { Component } = wp.element;

// Import block components
const {
  PanelColorSettings,
  InspectorControls,
} = wp.editor;

// Import Inspector components
const {
	PanelBody,
	RangeControl,
	SelectControl,
} = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {

	constructor( props ) {
		super( ...arguments );
	}

	render() {

		// Notice dismiss options
		const noticeDismissOptions = [
			{ value: null, label: __( 'Always Show', 'qodeblock' ) },
			{ value: 'qb-dismissable', label: __( 'Dismissible', 'qodeblock' ) },
		];

		// Notice colors
		const noticeColors = [
			{ color: '#00d1b2', name: 'teal' },
			{ color: '#3373dc', name: 'royal blue' },
			{ color: '#209cef', name: 'sky blue' },
			{ color: '#22d25f', name: 'green' },
			{ color: '#ffdd57', name: 'yellow' },
			{ color: '#ff3860', name: 'pink' },
			{ color: '#7941b6', name: 'purple' },
			{ color: '#392F43', name: 'black' },
		];

		// Setup the attributes
		const { attributes: { noticeBackgroundColor, noticeTextColor, noticeTitleColor, noticeFontSize, noticeDismiss } } = this.props;
		const { setAttributes } = this.props;

		// Update color values
		const onChangeBackgroundColor = value => setAttributes( { noticeBackgroundColor: value } );
		const onChangeTextColor = value => setAttributes( { noticeTextColor: value } );
		const onChangeTitleColor = value => setAttributes( { noticeTitleColor: value } );

		return (
		<InspectorControls key="inspector">
			<PanelBody>
				<RangeControl
					label={ __( 'Font Size', 'qodeblock' ) }
					value={ noticeFontSize }
					onChange={ ( value ) => this.props.setAttributes( { noticeFontSize: value } ) }
					min={ 14 }
					max={ 24 }
					step={ 1 }
				/>

				<SelectControl
					label={ __( 'Notice Display', 'qodeblock' ) }
					description={ __( 'Do you want the message to always show or dismissible?', 'qodeblock' ) }
					options={ noticeDismissOptions }
					value={ noticeDismiss }
					onChange={ ( value ) => this.props.setAttributes( { noticeDismiss: value } ) }
				/>
			</PanelBody>
			<PanelColorSettings
				title={ __( 'Notice Color', 'qodeblock' ) }
				colorValue={ noticeBackgroundColor }
				initialOpen={ false }
				colorSettings={ [ {
					value: noticeBackgroundColor,
					onChange: onChangeBackgroundColor,
					colors: noticeColors,
					label: __( 'Notice Color', 'qodeblock' ),
				} ] }
			>
			</PanelColorSettings>

			<PanelColorSettings
				title={ __( 'Title Color', 'qodeblock' ) }
				initialOpen={ false }
				colorSettings = { [ {
					value: noticeTitleColor,
					onChange: onChangeTitleColor,
					label: __( 'Title Color', 'qodeblock' ),
				} ] }
			>
			</PanelColorSettings>

			<PanelColorSettings
				title={ __( 'Text Color', 'qodeblock' ) }
				colorValue={ noticeTextColor }
				initialOpen={ false }
				colorSettings = { [ {
					value: noticeTextColor,
					onChange: onChangeTextColor,
					label: __( 'Text Color', 'qodeblock' ),
				} ] }
			>
			</PanelColorSettings>
		</InspectorControls>
		);
	}
}
